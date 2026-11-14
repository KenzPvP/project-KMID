<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\User;
use App\Rules\UgmEmail;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    /**
     * Tampilkan daftar pendaftar dengan pencarian dan filter status.
     */
    public function index(Request $request)
    {
        $query = Pendaftar::query();

        // Pencarian berdasarkan nama atau NIM
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan status
        if ($status = $request->input('status')) {
            if ($status !== 'Semua') {
                $query->where('status', $status);
            }
        }

        $pendaftars = $query->latest()->get();

        // Ringkasan metrik statistik
        $metrics = [
            'total' => Pendaftar::count(),
            'mendaftar' => Pendaftar::where('status', 'Mendaftar')->count(),
            'lolos_berkas' => Pendaftar::where('status', 'Lolos Berkas')->count(),
            'lolos_wawancara' => Pendaftar::where('status', 'Lolos Wawancara')->count(),
            'tidak_lolos' => Pendaftar::where('status', 'Tidak Lolos')->count(),
            'diterima' => Pendaftar::where('status', 'Diterima')->count(),
        ];

        return view('admin.kelola-akun-pendaftar', compact('pendaftars', 'metrics'));
    }

    /**
     * Tampilkan form tambah pendaftar baru.
     */
    public function create()
    {
        return view('admin.tambah-pendaftar');
    }

    /**
     * Simpan pendaftar baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'nim' => ['required', 'string', 'max:50', 'unique:pendaftars,nim'],
            'major' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:191', new UgmEmail],
            'phone_number' => ['nullable', 'string', 'max:30'],
            'division' => ['required', 'string', 'max:100'],
            'cv_url' => ['nullable', 'url', 'max:255'],
            'status' => ['nullable', 'string', 'max:50'],
            'motivation' => ['nullable', 'string'],
            'role' => ['nullable', 'string', 'in:pendaftar,staff,admin'],
            'password' => ['nullable', 'string', 'min:8'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'nim.required' => 'NIM wajib diisi.',
            'nim.unique' => 'NIM ini sudah terdaftar.',
            'major.required' => 'Program studi wajib diisi.',
            'email.required' => 'Email UGM wajib diisi.',
            'division.required' => 'Divisi pilihan wajib dipilih.',
            'cv_url.url' => 'Format link berkas harus berupa URL yang valid (contoh: https://...).',
            'password.min' => 'Kata sandi akun minimal 8 karakter.',
        ]);

        if (empty($validated['status'])) {
            $validated['status'] = 'Mendaftar';
        }

        $role = $validated['role'] ?? 'pendaftar';
        $plainPassword = !empty($validated['password']) ? $validated['password'] : 'password123';

        $pendaftar = Pendaftar::create([
            'name' => $validated['name'],
            'nim' => $validated['nim'],
            'major' => $validated['major'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'] ?? null,
            'division' => $validated['division'],
            'cv_url' => $validated['cv_url'] ?? null,
            'status' => $validated['status'],
            'motivation' => $validated['motivation'] ?? null,
        ]);

        // Buat atau sinkronkan akun User agar bisa langsung login
        $user = User::where('email', $validated['email'])->first();
        if ($user) {
            $user->update([
                'name' => $validated['name'],
                'password' => $plainPassword,
                'role' => $role,
                'nim' => $validated['nim'],
                'major' => $validated['major'],
                'phone_number' => $validated['phone_number'] ?? null,
                'is_active' => true,
            ]);
        } else {
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $plainPassword,
                'role' => $role,
                'nim' => $validated['nim'],
                'major' => $validated['major'],
                'phone_number' => $validated['phone_number'] ?? null,
                'is_active' => true,
            ]);
        }

        $isStaff = $request->is('staff*');
        $redirectRoute = $isStaff ? 'staff.pendaftar.index' : 'admin.pendaftar.index';
        $roleTitle = $role === 'admin' ? 'Administrator' : ($role === 'staff' ? 'Staff' : 'Pendaftar');

        return redirect()->route($redirectRoute)->with('success', "Akun {$roleTitle} '{$pendaftar->name}' berhasil ditambahkan! Akun dapat login menggunakan email '{$pendaftar->email}' dan kata sandi: '{$plainPassword}'.");
    }

    /**
     * Tampilkan detail pendaftar.
     */
    public function detail(Request $request)
    {
        $pendaftar = null;
        if ($request->filled('id')) {
            $pendaftar = Pendaftar::find($request->id);
        }
        if (!$pendaftar) {
            $pendaftar = Pendaftar::first();
        }

        return view('admin.detail-pendaftar', compact('pendaftar'));
    }

    /**
     * Perbarui status pendaftar (Terima, Tolak, Loloskan Berkas, dll).
     */
    public function updateStatus(Request $request, Pendaftar $pendaftar)
    {
        $request->validate([
            'status' => ['required', 'string', 'in:Mendaftar,Lolos Berkas,Lolos Wawancara,Tidak Lolos,Diterima'],
        ]);

        $pendaftar->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status pendaftar ' . $pendaftar->name . ' berhasil diubah menjadi ' . $request->status . '.');
    }
}
