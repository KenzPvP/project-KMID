<?php

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
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/open-recruitment', function () {
    return view('open-recruitment');
})->name('open-recruitment');

Route::get('/oprec', function () {
    return view('open-recruitment');
})->name('oprec');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.pendaftar.index');
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

// Route Group: Role Staff / Manager (Hanya Pengelolaan Pendaftaran, Tidak Bisa Mengelola Konten)
Route::prefix('staff')->name('staff.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('staff.pendaftar.index');
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
