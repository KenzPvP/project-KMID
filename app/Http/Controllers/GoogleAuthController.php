<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Arahkan pengguna ke halaman otentikasi Google.
     * Menggunakan parameter 'hd' (hosted domain) untuk memprioritaskan akun @mail.ugm.ac.id.
     */
    public function redirectToGoogle()
    {
        // Periksa apakah kredensial Google Client ID sudah disetel di .env
        $clientId = config('services.google.client_id');
        $clientSecret = config('services.google.client_secret');

        if (empty($clientId) || empty($clientSecret)) {
            return redirect()->route('login')->withErrors([
                'email' => 'Integrasi Login Google belum dikonfigurasi. Harap tentukan GOOGLE_CLIENT_ID dan GOOGLE_CLIENT_SECRET pada berkas konfigurasi .env.',
            ]);
        }

        try {
            return Socialite::driver('google')
                ->with([
                    'hd' => 'mail.ugm.ac.id',
                    'prompt' => 'select_account',
                ])
                ->redirect();
        } catch (\Throwable $e) {
            return redirect()->route('login')->withErrors([
                'email' => 'Tidak dapat menginisialisasi otentikasi Google: ' . $e->getMessage(),
            ]);
        }
    }

    /**
     * Tangani callback dari Google OAuth.
     * Wajib memverifikasi bahwa email yang kembali berdomain resmi UGM (@mail.ugm.ac.id atau @ugm.ac.id).
     */
    public function handleGoogleCallback(Request $request)
    {
        // Tangani pembatalan dari sisi pengguna di consent screen Google
        if ($request->has('error') || $request->has('error_description')) {
            $errorDesc = $request->get('error_description', 'Proses login dengan Google dibatalkan.');
            return redirect()->route('login')->withErrors([
                'email' => $errorDesc,
            ]);
        }

        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Throwable $e) {
            return redirect()->route('login')->withErrors([
                'email' => 'Gagal mengambil data akun dari Google: ' . $e->getMessage() . '. Silakan coba lagi.',
            ]);
        }

        $rawEmail = $googleUser->getEmail();
        if (empty($rawEmail)) {
            return redirect()->route('login')->withErrors([
                'email' => 'Akun Google Anda tidak menyediakan alamat email yang valid.',
            ]);
        }

        $email = strtolower(trim($rawEmail));

        // =========================================================================
        // VALIDASI KETAT: HANYA EMAIL UGM YANG DIIZINKAN MASUK
        // Mahasiswa: @mail.ugm.ac.id
        // Civitas / Staff / Dosen: @ugm.ac.id
        // =========================================================================
        $isUgm = str_ends_with($email, '@mail.ugm.ac.id') || str_ends_with($email, '@ugm.ac.id');

        if (!$isUgm) {
            return redirect()->route('login')->withErrors([
                'email' => "Akses Ditolak! Anda mencoba masuk menggunakan email '{$email}'. Sistem KMID UGM hanya mengizinkan login menggunakan akun Google resmi UGM (@mail.ugm.ac.id atau @ugm.ac.id).",
            ]);
        }

        // Cari akun yang sudah ada berdasarkan google_id atau email
        $user = User::where('google_id', $googleUser->getId())
            ->orWhere('email', $email)
            ->first();

        $avatarUrl = $googleUser->getAvatar();
        $googleName = $googleUser->getName() ?: explode('@', $email)[0];

        if ($user) {
            // Update google_id atau avatar jika belum tersimpan
            $updateData = [];
            if (empty($user->google_id)) {
                $updateData['google_id'] = $googleUser->getId();
            }
            if ($avatarUrl && empty($user->avatar)) {
                $updateData['avatar'] = $avatarUrl;
            }
            if (!empty($updateData)) {
                $user->update($updateData);
            }

            // Periksa apakah akun dinonaktifkan
            if (isset($user->is_active) && ! $user->is_active) {
                return redirect()->route('login')->withErrors([
                    'email' => 'Akun Anda dinonaktifkan. Silakan hubungi Administrator KMID.',
                ]);
            }
        } else {
            // Buat akun User baru secara otomatis khusus email UGM
            $user = User::create([
                'name' => $googleName,
                'email' => $email,
                'google_id' => $googleUser->getId(),
                'avatar' => $avatarUrl,
                'password' => Hash::make(Str::random(32)),
                'role' => 'pendaftar',
                'is_active' => true,
            ]);

            // Buat entri pendaftar awal jika belum ada
            $pendaftar = Pendaftar::where('email', $email)->first();
            if (!$pendaftar) {
                Pendaftar::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'nim' => 'M-' . strtoupper(Str::random(6)),
                    'major' => 'Universitas Gadjah Mada',
                    'division' => 'Media Creative',
                    'status' => 'Mendaftar',
                ]);
            }
        }

        // Login pengguna ke dalam session Laravel
        Auth::login($user, remember: true);
        $request->session()->regenerate();

        $role = strtolower(trim($user->role ?? 'pendaftar'));

        if ($role === 'admin') {
            return redirect()->route('admin.pendaftar.index')
                ->with('success', "Selamat datang kembali Administrator {$user->name}! Anda berhasil masuk melalui Google UGM.");
        }

        if ($role === 'staff') {
            return redirect()->route('staff.pendaftar.index')
                ->with('success', "Selamat datang kembali Staff {$user->name}! Anda berhasil masuk melalui Google UGM.");
        }

        return redirect()->route('open-recruitment')
            ->with('success', "Selamat datang di Portal Oprec KMID, {$user->name}! Anda berhasil masuk dengan email UGM ({$email}).");
    }
}
