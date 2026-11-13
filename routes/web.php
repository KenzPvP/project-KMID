<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\OprecDashboardController;
use App\Http\Controllers\StaffDashboardController;
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

Route::get('/dashboard', function () {
    $user = Auth::user();

    return match ($user?->role) {
        'admin' => redirect()->route('admin.dashboard'),
        'staff' => redirect()->route('staff.dashboard'),
        default => redirect()->route('oprec.dashboard'),
    };
})->middleware('auth')->name('dashboard');

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
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

        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'staff' => redirect()->route('staff.dashboard'),
            default => redirect()->route('oprec.dashboard'),
        };
    }

    return back()->withErrors([
        'email' => 'Email atau kata sandi yang dimasukkan tidak sesuai.',
    ])->onlyInput('email');
});

Route::get('/register', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
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

    Auth::login($user);
    $request->session()->regenerate();

    return redirect()->route('oprec.dashboard');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
})->name('logout');

Route::get('/open-recruitment', function () {
    return view('open-recruitment');
})->name('open-recruitment');

Route::get('/oprec', function () {
    return view('open-recruitment');
})->name('oprec');

// Route Group: Role Admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    })->name('index');

    Route::get('/kelola-akun', function () {
        return view('admin.kelola-akun-pendaftar');
    })->name('pendaftar.index');

    Route::get('/kelola-akun/detail', function () {
        return view('admin.detail-pendaftar');
    })->name('pendaftar.detail');

    Route::get('/kelola-akun/tambah', function () {
        return view('admin.tambah-pendaftar');
    })->name('pendaftar.create');

    Route::get('/jadwal-wawancara', function () {
        return view('admin.jadwal-wawancara');
    })->name('pendaftar.wawancara');

    Route::get('/jadwal-wawancara/tambah', function () {
        return view('admin.tambah-jadwal');
    })->name('pendaftar.tambah-jadwal');

    Route::get('/pengaturan-pendaftaran', function () {
        return view('admin.pengaturan-pendaftaran');
    })->name('pendaftar.pengaturan');

    Route::get('/kepengurusan', function () {
        return view('admin.kepengurusan');
    })->name('kepengurusan');

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

// Route Group: Role Staff / Manager
Route::prefix('staff')->name('staff.')->middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');

    Route::get('/', function () {
        return redirect()->route('staff.dashboard');
    })->name('index');

    Route::get('/kelola-akun', function () {
        return view('admin.kelola-akun-pendaftar');
    })->name('pendaftar.index');

    Route::get('/kelola-akun/detail', function () {
        return view('admin.detail-pendaftar');
    })->name('pendaftar.detail');

    Route::get('/kelola-akun/tambah', function () {
        return view('admin.tambah-pendaftar');
    })->name('pendaftar.create');

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

// Route Group: Role Pendaftar
Route::prefix('oprec')->name('oprec.')->middleware(['auth', 'role:pendaftar'])->group(function () {
    Route::get('/dashboard', [OprecDashboardController::class, 'index'])->name('dashboard');

    Route::get('/', function () {
        return redirect()->route('oprec.dashboard');
    })->name('index');
});
