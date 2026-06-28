<?php

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\ManualController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\TentangKamiController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\TrackVisitorMiddleware;
use Illuminate\Support\Facades\Route;

// =========================
// TRACK VISITOR
// =========================
Route::middleware([TrackVisitorMiddleware::class])->group(function () {

    // Frontend
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Login & Logout
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

// =========================
// ADMIN
// =========================
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Notification routes
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.read-all');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    Route::delete('/notifications', [NotificationController::class, 'destroyAll'])->name('notifications.destroy-all');

    // Pengaturan
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');
    Route::post('/pengaturan', [PengaturanController::class, 'update'])->name('pengaturan.update');

    // Layanan
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
    Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::put('/layanan/{id}', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

    // Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // Portofolio
    Route::get('/portofolio', [PortofolioController::class, 'index'])->name('portofolio');
    Route::post('/portofolio', [PortofolioController::class, 'store'])->name('portofolio.store');
    Route::put('/portofolio/{id}', [PortofolioController::class, 'update'])->name('portofolio.update');
    Route::delete('/portofolio/{id}', [PortofolioController::class, 'destroy'])->name('portofolio.destroy');

    // Testimoni
    Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni');
    Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');
    Route::put('/testimoni/{id}', [TestimoniController::class, 'update'])->name('testimoni.update');
    Route::delete('/testimoni/{id}', [TestimoniController::class, 'destroy'])->name('testimoni.destroy');

    // Tentang Kami
    Route::get('/tentang', [TentangKamiController::class, 'index'])->name('tentang');
    Route::put('/tentang', [TentangKamiController::class, 'update'])->name('tentang.update');

    // Manual Book
    Route::get('/manual', ManualController::class)->name('manual');
});
