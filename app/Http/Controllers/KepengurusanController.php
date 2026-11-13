<?php

namespace App\Http\Controllers;

use App\Models\Kepengurusan;
use App\Models\User;
use App\Rules\UgmEmail;
use Illuminate\Http\Request;

class KepengurusanController extends Controller
{
    /**
     * Tampilkan daftar kepengurusan.
     */
    public function index(Request $request)
    {
        $query = Kepengurusan::query();

        // Pencarian berdasarkan nama atau jabatan
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('position', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan kelompok
        if ($group = $request->input('group')) {
            if ($group !== 'Semua kelompok') {
                $query->where('group', $group);
            }
        }

        // Filter berdasarkan periode
        if ($period = $request->input('period')) {
            if ($period !== 'Semua periode') {
                $query->where('period', $period);
            }
        }

        $pengurusList = $query->orderBy('order', 'asc')->orderBy('id', 'asc')->get();

        $stats = [
            'total' => Kepengurusan::count(),
            'published' => Kepengurusan::where('status', 'Dipublikasikan')->count(),
            'draft' => Kepengurusan::where('status', 'Draf')->count(),
        ];

        return view('admin.kepengurusan', compact('pengurusList', 'stats'));
    }

    /**
     * Tampilkan form tambah pengurus baru.
     */
    public function create()
    {
        // Cari urutan berikutnya secara otomatis
        $nextOrder = (Kepengurusan::max('order') ?? 0) + 1;

        return view('admin.tambah-kepengurusan', compact('nextOrder'));
    }

    /**
     * Simpan pengurus baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['nullable', 'string', 'email', 'max:191', new UgmEmail],
            'department' => ['nullable', 'string', 'max:150'],
            'group' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:100'],
            'period' => ['required', 'string', 'max:50'],
            'order' => ['nullable', 'integer', 'min:1'],
            'status' => ['required', 'string', 'in:Dipublikasikan,Draf'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
            'password' => ['nullable', 'string', 'min:8'],
        ], [
            'name.required' => 'Nama lengkap & gelar wajib diisi.',
            'group.required' => 'Kelompok struktur wajib dipilih.',
            'position.required' => 'Jabatan pengurus wajib diisi.',
            'period.required' => 'Periode kepengurusan wajib diisi.',
            'status.required' => 'Status publikasi wajib dipilih.',
            'photo.image' => 'File foto harus berupa gambar (JPEG, PNG, JPG, WEBP, SVG).',
            'photo.max' => 'Ukuran file foto maksimal 2 MB.',
            'password.min' => 'Kata sandi akun staff minimal 8 karakter.',
        ]);

        if (empty($validated['order'])) {
            $validated['order'] = (Kepengurusan::max('order') ?? 0) + 1;
        }

        // Upload foto jika ada
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $file = $request->file('photo');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            $destinationPath = public_path('uploads/kepengurusan');
            
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $filename);
            $validated['photo_url'] = 'uploads/kepengurusan/' . $filename;
        }

        $pengurusData = collect($validated)->except(['password'])->toArray();
        $pengurus = Kepengurusan::create($pengurusData);

        // Buat akun login Staff jika give_staff_access aktif (atau email diisi)
        $accountNote = '';
        $giveStaffAccess = $request->boolean('give_staff_access', true);
        if ($giveStaffAccess && !empty($validated['email'])) {
            $plainPassword = $request->filled('password') ? $request->password : 'password123';
            
            $user = User::where('email', $validated['email'])->first();
            if ($user) {
                $user->update([
                    'name' => $validated['name'],
                    'password' => $plainPassword,
                    'role' => 'staff',
                    'is_active' => true,
                ]);
            } else {
                User::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'password' => $plainPassword,
                    'role' => 'staff',
                    'is_active' => true,
                ]);
            }

            $accountNote = " Akun Staff berhasil dibuat untuk email '{$validated['email']}' dengan kata sandi: '{$plainPassword}'. Saat login, akun langsung diarahkan ke Dashboard Staff.";
        }

        return redirect()->route('admin.kepengurusan')->with('success', 'Pengurus ' . $pengurus->name . ' berhasil ditambahkan.' . $accountNote);
    }

    /**
     * Tampilkan form edit pengurus.
     */
    public function edit(Kepengurusan $pengurus)
    {
        $userAccount = !empty($pengurus->email) ? User::where('email', $pengurus->email)->first() : null;
        return view('admin.edit-kepengurusan', compact('pengurus', 'userAccount'));
    }

    /**
     * Perbarui data pengurus di database.
     */
    public function update(Request $request, Kepengurusan $pengurus)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['nullable', 'string', 'email', 'max:191', new UgmEmail],
            'department' => ['nullable', 'string', 'max:150'],
            'group' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:100'],
            'period' => ['required', 'string', 'max:50'],
            'order' => ['nullable', 'integer', 'min:1'],
            'status' => ['required', 'string', 'in:Dipublikasikan,Draf'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
            'password' => ['nullable', 'string', 'min:8'],
        ], [
            'name.required' => 'Nama lengkap & gelar wajib diisi.',
            'group.required' => 'Kelompok struktur wajib dipilih.',
            'position.required' => 'Jabatan pengurus wajib diisi.',
            'period.required' => 'Periode kepengurusan wajib diisi.',
            'status.required' => 'Status publikasi wajib dipilih.',
            'photo.image' => 'File foto harus berupa gambar (JPEG, PNG, JPG, WEBP, SVG).',
            'photo.max' => 'Ukuran file foto maksimal 2 MB.',
            'password.min' => 'Kata sandi akun staff minimal 8 karakter.',
        ]);

        if (empty($validated['order'])) {
            $validated['order'] = $pengurus->order;
        }

        // Upload foto baru jika ada
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            // Hapus foto lama jika ada
            if ($pengurus->photo_url && file_exists(public_path($pengurus->photo_url))) {
                @unlink(public_path($pengurus->photo_url));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            $destinationPath = public_path('uploads/kepengurusan');
            
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $filename);
            $validated['photo_url'] = 'uploads/kepengurusan/' . $filename;
        }

        $pengurusData = collect($validated)->except(['password'])->toArray();
        $pengurus->update($pengurusData);

        // Sinkronkan akun login Staff
        $accountNote = '';
        $giveStaffAccess = $request->boolean('give_staff_access');
        if (!empty($validated['email'])) {
            $user = User::where('email', $validated['email'])->first();

            if ($giveStaffAccess) {
                $userData = [
                    'name' => $validated['name'],
                    'role' => 'staff',
                    'is_active' => true,
                ];

                if ($request->filled('password')) {
                    $userData['password'] = $request->password;
                    $accountNote = " Kata sandi akun staff berhasil diperbarui.";
                } elseif (!$user) {
                    $userData['password'] = 'password123';
                    $accountNote = " Akun Staff berhasil dibuat dengan password default 'password123'.";
                } else {
                    $accountNote = " Hak akses Staff telah disinkronkan (Role: staff).";
                }

                if ($user) {
                    $user->update($userData);
                } else {
                    $userData['email'] = $validated['email'];
                    User::create($userData);
                }
            }
        }

        return redirect()->route('admin.kepengurusan')->with('success', 'Data pengurus ' . $pengurus->name . ' berhasil diperbarui.' . $accountNote);
    }

    /**
     * Hapus data pengurus.
     */
    public function destroy(Kepengurusan $pengurus)
    {
        if ($pengurus->photo_url && file_exists(public_path($pengurus->photo_url))) {
            @unlink(public_path($pengurus->photo_url));
        }

        $nama = $pengurus->name;
        $pengurus->delete();

        return redirect()->route('admin.kepengurusan')->with('success', 'Pengurus ' . $nama . ' berhasil dihapus.');
    }
}
