<?php

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

        return redirect()->route('home');
    }

    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'string', 'email', new UgmEmail],
        'password' => ['required', 'string'],
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

        return redirect()->intended(route('home'));
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

        return redirect()->route('home');
    }

    return view('register');
})->name('register');

Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:150'],
        'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email', new UgmEmail],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => $validated['password'],
        'role' => 'pendaftar',
        'is_active' => true,
    ]);

    return redirect()->route('login')->with('success', 'Pendaftaran akun berhasil. Silakan masuk menggunakan akun Anda.');
});

Route::match(['get', 'post'], '/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login')->with('success', 'Anda telah berhasil keluar.');
})->name('logout');

Route::get('/open-recruitment', function () {
    return view('open-recruitment');
})->name('open-recruitment');

Route::get('/oprec', function () {
    return view('open-recruitment');
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

    Route::get('/jadwal-wawancara', function () {
        return view('admin.jadwal-wawancara');
    })->name('pendaftar.wawancara');

    Route::get('/jadwal-wawancara/tambah', function () {
        return view('admin.tambah-jadwal');
    })->name('pendaftar.tambah-jadwal');

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

    Route::get('/jadwal-wawancara', function () {
        return view('admin.jadwal-wawancara');
    })->name('pendaftar.wawancara');

    Route::get('/jadwal-wawancara/tambah', function () {
        return view('admin.tambah-jadwal');
    })->name('pendaftar.tambah-jadwal');

    Route::get('/pengaturan-pendaftaran', function () {
        return view('admin.pengaturan-pendaftaran');
    })->name('pendaftar.pengaturan');
});
