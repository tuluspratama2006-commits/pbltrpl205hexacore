<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;

// Frontend
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', fn() => view('about'))->name('about');
Route::get('/layanan', fn() => view('services'))->name('services');
Route::get('/portofolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portofolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/dokumen', [DocumentController::class, 'index'])->name('documents');
Route::get('/dokumen/download/{id}', [DocumentController::class, 'download'])->name('document.download');
Route::get('/sertifikasi', fn() => view('certifications'))->name('certifications');
Route::get('/kontak', fn() => view('contact'))->name('contact');
Route::get('/blog', fn() => view('blog'))->name('blog');

// Admin Auth
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Dashboard (protected)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {



    // Tambahkan di routes/web.php
Route::get('/tentang', function () {
    return view('about');
})->name('about');

Route::get('/layanan', function () {
    return view('services');
})->name('services');

Route::get('/sertifikasi', function () {
    return view('certifications');
})->name('certifications');

});
