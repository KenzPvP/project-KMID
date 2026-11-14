<?php

use App\Http\Controllers\JadwalWawancaraController;
use App\Http\Controllers\KepengurusanController;
use App\Http\Controllers\PendaftarController;
use App\Models\User;
use App\Rules\UgmEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/activities', function () {
    return view('activities');
})->name('activities');

Route::get('/impact', function () {
    return view('impact');
})->name('impact');

Route::get('/information', function () {
    return view('information');
})->name('information');

Route::get('/login', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.pendaftar.index');
        }
        if ($user->role === 'staff') {
            return redirect()->route('staff.pendaftar.index');
        }

        return redirect()->route('open-recruitment');
    }

    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'string', 'email', new UgmEmail],
        'password' => ['required', 'string'],
    ], [
        'email.required' => 'Email wajib diisi.',
        'password.required' => 'Kata sandi wajib diisi.',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        // Redirect langsung ke dashboard admin jika akun admin
        if ($user->role === 'admin') {
            return redirect()->route('admin.pendaftar.index');
        }

        // Redirect ke dashboard staff jika akun staff
        if ($user->role === 'staff') {
            return redirect()->route('staff.pendaftar.index');
        }

        // Redirect ke dashboard oprec jika akun user biasa / pendaftar
        return redirect()->route('open-recruitment');
    }

    return back()->withErrors([
        'email' => 'Email atau kata sandi yang dimasukkan tidak sesuai.',
    ])->onlyInput('email');
});

Route::get('/register', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.pendaftar.index');
        }
        if ($user->role === 'staff') {
            return redirect()->route('staff.pendaftar.index');
        }

        return redirect()->route('open-recruitment');
    }

    return view('register');
})->name('register');

Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:150'],
        'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email', new UgmEmail],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ], [
        'name.required' => 'Nama lengkap wajib diisi.',
        'email.required' => 'Email wajib diisi.',
        'email.unique' => 'Email ini sudah terdaftar. Silakan masuk menggunakan akun Anda.',
        'password.required' => 'Kata sandi wajib diisi.',
        'password.min' => 'Kata sandi minimal 8 karakter.',
        'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => $validated['password'],
        'role' => 'pendaftar',
        'is_active' => true,
    ]);

    return redirect()->route('login')->with('success', 'Pendaftaran akun berhasil! Silakan masuk menggunakan akun Anda untuk melanjutkan ke Dashboard Oprec.');
});

Route::match(['get', 'post'], '/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login')->with('success', 'Anda telah berhasil keluar.');
})->name('logout');

Route::get('/open-recruitment', function () {
    if (!Auth::check()) {
        return redirect()->route('login')->withErrors([
            'email' => 'Silakan masuk terlebih dahulu untuk mengakses Dashboard Pendaftaran (Oprec).',
        ]);
    }

    $user = Auth::user();
    $pendaftar = \App\Models\Pendaftar::where('email', $user->email)->first();
    $availableSlots = \App\Models\JadwalWawancara::where('status', 'Tersedia')
        ->orderBy('tanggal', 'asc')
        ->orderBy('jam_mulai', 'asc')
        ->get();

    return view('open-recruitment', compact('pendaftar', 'availableSlots'));
})->name('open-recruitment');

Route::get('/open-recruitment/check-status', function () {
    if (!Auth::check()) {
        return response()->json(['error' => 'Unauthenticated'], 401);
    }
    $pendaftar = \App\Models\Pendaftar::where('email', Auth::user()->email)->first();
    $status = $pendaftar->status ?? null;
    $isBerkasDiterima = $pendaftar && in_array($status, ['Lolos Berkas', 'Lolos Wawancara', 'Diterima']);

    return response()->json([
        'hasRegistered' => !empty($pendaftar),
        'status' => $status,
        'isBerkasDiterima' => $isBerkasDiterima,
    ]);
})->name('open-recruitment.check-status');

Route::post('/open-recruitment', function (Request $request) {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $validated = $request->validate([
        'nama_lengkap' => ['required', 'string', 'max:150'],
        'nim' => ['required', 'string', 'max:50'],
        'asal_prodi' => ['required', 'string', 'max:100'],
        'divisi_pertama' => ['required', 'string', 'max:100'],
        'alasan_divisi_pertama' => ['nullable', 'string'],
        'no_whatsapp' => ['nullable', 'string', 'max:30'],
        'file_cv' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:10240'],
        'file_porto' => ['nullable', 'file', 'mimes:pdf,zip,rar,png,jpg,jpeg', 'max:20480'],
    ], [
        'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
        'nim.required' => 'NIM wajib diisi.',
        'asal_prodi.required' => 'Asal program studi wajib diisi.',
        'divisi_pertama.required' => 'Pilihan divisi pertama wajib dipilih.',
        'file_cv.file' => 'Berkas CV harus berupa file yang valid.',
        'file_cv.mimes' => 'Format berkas CV harus berupa PDF, DOC, atau DOCX.',
        'file_cv.max' => 'Ukuran berkas CV maksimal 10 MB.',
        'file_porto.file' => 'Berkas Portofolio harus berupa file yang valid.',
        'file_porto.mimes' => 'Format berkas Portofolio harus berupa PDF, ZIP, RAR, PNG, JPG, atau JPEG.',
        'file_porto.max' => 'Ukuran berkas Portofolio maksimal 20 MB.',
        'no_whatsapp.max' => 'Nomor WhatsApp maksimal 30 karakter.',
    ]);

    $user = Auth::user();
    $cvPath = null;
    if ($request->hasFile('file_cv') && $request->file('file_cv')->isValid()) {
        $file = $request->file('file_cv');
        $filename = 'cv_' . time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
        $destination = public_path('uploads/cv');
        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }
        $file->move($destination, $filename);
        $cvPath = 'uploads/cv/' . $filename;
    }

    $portoPath = null;
    if ($request->hasFile('file_porto') && $request->file('file_porto')->isValid()) {
        $file = $request->file('file_porto');
        $filename = 'porto_' . time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
        $destination = public_path('uploads/portfolio');
        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }
        $file->move($destination, $filename);
        $portoPath = 'uploads/portfolio/' . $filename;
    }

    $data = [
        'name' => $validated['nama_lengkap'],
        'nim' => $validated['nim'],
        'major' => $validated['asal_prodi'],
        'division' => $validated['divisi_pertama'],
        'motivation' => $validated['alasan_divisi_pertama'] ?? null,
        'phone_number' => $validated['no_whatsapp'] ?? null,
    ];
    if ($cvPath) {
        $data['cv_url'] = $cvPath;
    }
    if ($portoPath) {
        $data['portfolio_url'] = $portoPath;
    }

    $existing = \App\Models\Pendaftar::where('email', $user->email)->first();
    if ($existing) {
        $existing->update($data);
    } else {
        $data['email'] = $user->email;
        $data['status'] = 'Mendaftar';
        \App\Models\Pendaftar::create($data);
    }

    return redirect()->route('open-recruitment')->with('success', 'Pendaftaran Oprec KMID berhasil dikirim! Berkas Anda sedang menunggu peninjauan dan persetujuan dari Admin.');
})->name('open-recruitment.store');

Route::post('/open-recruitment/jadwal-wawancara', function (Request $request) {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $request->validate([
        'jam_wawancara' => ['required', 'string'],
    ], [
        'jam_wawancara.required' => 'Silakan pilih salah satu sesi jam wawancara.',
    ]);

    $user = Auth::user();
    $pendaftar = \App\Models\Pendaftar::where('email', $user->email)->first();
    if ($pendaftar) {
        $jadwalId = $request->input('jadwal_id');
        $slot = null;
        if ($jadwalId) {
            $slot = \App\Models\JadwalWawancara::find($jadwalId);
        }
        if (!$slot) {
            $slot = \App\Models\JadwalWawancara::where('status', 'Tersedia')
                ->where('jam_mulai', 'like', substr($request->jam_wawancara, 0, 5) . '%')
                ->first();
        }

        if ($slot) {
            // Lepas slot lama jika pendaftar sudah memiliki slot
            \App\Models\JadwalWawancara::where('pendaftar_id', $pendaftar->id)->update([
                'status' => 'Tersedia',
                'pendaftar_id' => null,
            ]);

            $slot->update([
                'status' => 'Terisi',
                'pendaftar_id' => $pendaftar->id,
            ]);

            $pendaftar->update([
                'interview_date' => $slot->tanggal_pendek,
                'interview_time' => $slot->jam_range,
            ]);
        } else {
            $pendaftar->update([
                'interview_date' => $request->tanggal_wawancara ?? '8 - 10 Oktober 2026',
                'interview_time' => $request->jam_wawancara,
            ]);
        }
    }

    return redirect()->route('open-recruitment', ['tab' => 'wawancara'])->with('success', 'Jadwal wawancara berhasil dikonfirmasi untuk sesi ' . $request->jam_wawancara . '!');
})->name('open-recruitment.jadwal');

Route::get('/oprec', function () {
    return redirect()->route('open-recruitment');
})->name('oprec');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.pendaftar.index');
    })->name('index');

    Route::get('/dashboard', function () {
        return redirect()->route('admin.pendaftar.index');
    })->name('dashboard');

    Route::get('/kelola-akun', [PendaftarController::class, 'index'])->name('pendaftar.index');
    Route::get('/kelola-akun/detail', [PendaftarController::class, 'detail'])->name('pendaftar.detail');
    Route::get('/kelola-akun/tambah', [PendaftarController::class, 'create'])->name('pendaftar.create');
    Route::post('/kelola-akun/tambah', [PendaftarController::class, 'store'])->name('pendaftar.store');
    Route::post('/kelola-akun/{pendaftar}/status', [PendaftarController::class, 'updateStatus'])->name('pendaftar.status');

    Route::get('/jadwal-wawancara', [JadwalWawancaraController::class, 'index'])->name('pendaftar.wawancara');
    Route::get('/jadwal-wawancara/tambah', [JadwalWawancaraController::class, 'create'])->name('pendaftar.tambah-jadwal');
    Route::post('/jadwal-wawancara/tambah', [JadwalWawancaraController::class, 'store'])->name('pendaftar.store-jadwal');
    Route::delete('/jadwal-wawancara/{jadwal}', [JadwalWawancaraController::class, 'destroy'])->name('pendaftar.destroy-jadwal');
    Route::post('/jadwal-wawancara/{jadwal}/assign', [JadwalWawancaraController::class, 'assignPendaftar'])->name('pendaftar.assign-jadwal');

    Route::get('/pengaturan-pendaftaran', function () {
        return view('admin.pengaturan-pendaftaran');
    })->name('pendaftar.pengaturan');

    Route::get('/kepengurusan', [KepengurusanController::class, 'index'])->name('kepengurusan');
    Route::get('/kepengurusan/tambah', [KepengurusanController::class, 'create'])->name('kepengurusan.create');
    Route::post('/kepengurusan/tambah', [KepengurusanController::class, 'store'])->name('kepengurusan.store');
    Route::get('/kepengurusan/{pengurus}/edit', [KepengurusanController::class, 'edit'])->name('kepengurusan.edit');
    Route::put('/kepengurusan/{pengurus}', [KepengurusanController::class, 'update'])->name('kepengurusan.update');
    Route::delete('/kepengurusan/{pengurus}', [KepengurusanController::class, 'destroy'])->name('kepengurusan.destroy');

    Route::get('/galeri-aktivitas', function () {
        return view('admin.galeri-aktivitas');
    })->name('galeri-aktivitas');

    Route::get('/galeri-aktivitas/edit', function () {
        return view('admin.edit-galeri-aktivitas');
    })->name('galeri-aktivitas.edit');

    Route::get('/prestasi-lidm', function () {
        return view('admin.prestasi-lidm');
    })->name('prestasi-lidm');

    Route::get('/info-kompetisi', function () {
        return view('admin.info-kompetisi-nasional');
    })->name('info-kompetisi');

    Route::get('/persyaratan-guidebook', function () {
        return view('admin.persyaratan-guidebook');
    })->name('persyaratan-guidebook');
});

// Route Group: Role Staff / Manager (Hanya Pengelolaan Pendaftaran, Tidak Bisa Mengelola Konten)
Route::prefix('staff')->name('staff.')->middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('staff.pendaftar.index');
    })->name('index');

    Route::get('/dashboard', function () {
        return redirect()->route('staff.pendaftar.index');
    })->name('dashboard');

    Route::get('/kelola-akun', [PendaftarController::class, 'index'])->name('pendaftar.index');
    Route::get('/kelola-akun/detail', [PendaftarController::class, 'detail'])->name('pendaftar.detail');
    Route::get('/kelola-akun/tambah', [PendaftarController::class, 'create'])->name('pendaftar.create');
    Route::post('/kelola-akun/tambah', [PendaftarController::class, 'store'])->name('pendaftar.store');
    Route::post('/kelola-akun/{pendaftar}/status', [PendaftarController::class, 'updateStatus'])->name('pendaftar.status');

    Route::get('/jadwal-wawancara', [JadwalWawancaraController::class, 'index'])->name('pendaftar.wawancara');
    Route::get('/jadwal-wawancara/tambah', [JadwalWawancaraController::class, 'create'])->name('pendaftar.tambah-jadwal');
    Route::post('/jadwal-wawancara/tambah', [JadwalWawancaraController::class, 'store'])->name('pendaftar.store-jadwal');
    Route::delete('/jadwal-wawancara/{jadwal}', [JadwalWawancaraController::class, 'destroy'])->name('pendaftar.destroy-jadwal');
    Route::post('/jadwal-wawancara/{jadwal}/assign', [JadwalWawancaraController::class, 'assignPendaftar'])->name('pendaftar.assign-jadwal');

    Route::get('/pengaturan-pendaftaran', function () {
        return view('admin.pengaturan-pendaftaran');
    })->name('pendaftar.pengaturan');
});
