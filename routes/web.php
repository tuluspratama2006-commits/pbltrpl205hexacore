<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\LayananController;

// =========================
// FRONTEND / USER
// =========================
Route::get('/', [HomeController::class, 'index'])->name('home');

// Login & Logout
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// =========================
// ADMIN — dilindungi middleware
// =========================
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {

    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::get('/portofolio', fn() => view('admin.portofolio'))->name('portofolio');
    Route::get('/berita',    fn() => view('admin.berita'))->name('berita');
    Route::get('/testimoni', fn() => view('admin.testimoni'))->name('testimoni');
    Route::get('/pengaturan',fn() => view('admin.pengaturan'))->name('pengaturan');

    // Layanan (CRUD)
    Route::get('/layanan',           [LayananController::class, 'index'])->name('layanan');
    Route::post('/layanan',          [LayananController::class, 'store'])->name('layanan.store');
    Route::put('/layanan/{id}',      [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{id}',   [LayananController::class, 'destroy'])->name('layanan.destroy');

});