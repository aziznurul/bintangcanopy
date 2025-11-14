<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\MitraCabangController;
use App\Http\Controllers\KontakController;



use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeSlideController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\OrganizationStructureController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\MitraController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\TaglineController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/portfolio', [PortofolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{id}', [PortofolioController::class, 'show'])->name('portfolio.show');
Route::get('/portfolio/more', [PortfolioController::class, 'loadMore'])->name('portfolio.more');
Route::get('/mitra', [MitraCabangController::class, 'index'])->name('mitra');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
Route::get('/search', [SearchController::class, 'index'])->name('search');



Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('home', HomeSlideController::class);
});

// Semua route admin wajib login
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // About Section
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('/about/update', [AboutController::class, 'update'])->name('about.update');

    // Struktur Organisasi
    Route::post('/organization/store', [OrganizationStructureController::class, 'store'])->name('organization.store');
    Route::delete('/organization/{id}', [OrganizationStructureController::class, 'destroy'])->name('organization.destroy');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Halaman utama Services (menampilkan ServiceInfo + daftar Service)
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

    // Update deskripsi umum layanan (ServiceInfo)
    Route::post('/services/update-info', [ServiceController::class, 'updateInfo'])->name('services.updateInfo');

    // Tambah layanan baru (Service)
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');

    // Hapus layanan (Service)
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::post('/portfolio/update-info', [PortfolioController::class, 'updateInfo'])->name('portfolio.updateInfo');
    Route::post('/portfolio/store', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::delete('/portfolio/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/mitra', [MitraController::class, 'index'])->name('mitra.index');
    Route::post('/mitra/update-deskripsi', [MitraController::class, 'updateDeskripsi'])->name('mitra.updateDeskripsi');
    Route::post('/mitra/store', [MitraController::class, 'store'])->name('mitra.store');
    Route::put('/mitra/{id}', [MitraController::class, 'update'])->name('mitra.update');
    Route::delete('/mitra/{id}', [MitraController::class, 'destroy'])->name('mitra.destroy');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/seo', [SeoController::class, 'index'])->name('seo.index');
    Route::post('/seo/update', [SeoController::class, 'update'])->name('seo.update');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/tagline', [TaglineController::class, 'index'])->name('tagline.index');
    Route::post('/tagline/{id}', [TaglineController::class, 'update'])->name('tagline.update');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/logo', [LogoController::class, 'index'])->name('logo.index');
    Route::post('/logo/{id}', [LogoController::class, 'update'])->name('logo.update');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/social-media', [SocialMediaController::class, 'index'])->name('social_media.index');
    Route::post('/social-media/{id}', [SocialMediaController::class, 'update'])->name('social_media.update');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
