<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\Auth\LoginController;


// Route untuk login
//   Route::get('/', [SiswaController::class, 'index'])->name('/');

  Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');

// Dashboard Berdasarkan Role
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // View dashboard admin
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'role:siswa'])->group(function () {
    // Route::get('/user/dashboard', function () {
    //     return view('user.dashboard'); // View dashboard user
    // })->name('user.dashboard');
    Route::get('/user/dashboard', [AbsensiController::class, 'showAbsensi'])->name('user.dashboard');

});

// Route untuk logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// absen
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AbsensiController::class, 'showAbsensi'])->name('dashboard'); 
    Route::post('/absen-datang', [AbsensiController::class, 'absenDatang'])->name('absen.datang');
    Route::post('/absen-pulang', [AbsensiController::class, 'absenPulang'])->name('absen.pulang');
});




Route::get('/absen', function () {
    return view('absen');
});

Route::get('/cob', function () {
    return view('cob`');
});

Route::get('/siswa', function () {
    return view('siswa');
});

