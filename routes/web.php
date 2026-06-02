<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// =========================
// FRONTEND / USER
// =========================
Route::get('/', [HomeController::class, 'index'])->name('home');


// =========================
// ADMIN
// =========================
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::get('/portofolio', fn() => view('admin.portofolio'))->name('portofolio');
    Route::get('/layanan', fn() => view('admin.layanan'))->name('layanan');
    Route::get('/berita', fn() => view('admin.berita'))->name('berita');
    Route::get('/testimoni', fn() => view('admin.testimoni'))->name('testimoni');
    Route::get('/pengaturan', fn() => view('admin.pengaturan'))->name('pengaturan');

});