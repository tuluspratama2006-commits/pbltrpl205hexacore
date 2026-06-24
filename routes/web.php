<?php

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// =========================
// FRONTEND / USER
// =========================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Login & Logout
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// =========================
// ADMIN — dilindungi middleware
// =========================
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {

    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');
    Route::get('/portofolio', fn () => view('admin.portofolio'))->name('portofolio');
    Route::get('/berita', fn () => view('admin.berita'))->name('berita');
    Route::get('/testimoni', fn () => view('admin.testimoni'))->name('testimoni');

    // Dashboard Admin
    Route::get('/dashboard', [BeritaController::class, 'index'])->name('dashboard');

    // Pengaturan
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');
    Route::post('/pengaturan', [PengaturanController::class, 'update'])->name('pengaturan.update');

    // Layanan (CRUD)
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
    Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::put('/layanan/{id}', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

    // Berita (CRUD)
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // Portofolio (CRUD)
    Route::get('/portofolio', [PortofolioController::class, 'index'])->name('portofolio');
    Route::post('/portofolio', [PortofolioController::class, 'store'])->name('portofolio.store');
    Route::put('/portofolio/{id}', [PortofolioController::class, 'update'])->name('portofolio.update');
    Route::delete('/portofolio/{id}', [PortofolioController::class, 'destroy'])->name('portofolio.destroy');

    // Testimoni (CRUD)
    Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni');
    Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');
    Route::put('/testimoni/{id}', [TestimoniController::class, 'update'])->name('testimoni.update');
    Route::delete('/testimoni/{id}', [TestimoniController::class, 'destroy'])->name('testimoni.destroy');

}); // ← HANYA SATU KURUNG PENUTUP
