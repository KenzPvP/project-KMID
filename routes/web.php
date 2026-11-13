<?php

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
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'string', 'email', new UgmEmail],
        'password' => ['required', 'string'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }

    return back()->withErrors([
        'email' => 'Email atau kata sandi yang dimasukkan tidak sesuai.',
    ])->onlyInput('email');
});

Route::get('/register', function () {
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
    ]);

    Auth::login($user);

    return redirect()->route('home');
});

Route::get('/open-recruitment', function () {
    return view('open-recruitment');
})->name('open-recruitment');

Route::get('/oprec', function () {
    return view('open-recruitment');
})->name('oprec');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.kepengurusan');
    })->name('index');

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
