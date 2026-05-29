<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\IndustryGalleryController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController as AdminManageController;
use App\Http\Controllers\Admin\DashboardController;



// Halaman utama
Route::get('/', [HomeController::class, 'index']);
Route::get('/items', [HomeController::class, 'items']);
Route::get('/industry', [HomeController::class, 'industry']);

// Halaman lain
Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/location', function () {
    return view('location', ['title' => 'Location']);
});

// Fallback untuk route 'login' bawaan Laravel
Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');

// Route untuk admin (tanpa auth)
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.loginForm');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');

// Route untuk admin (dengan auth)
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Produk
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::put('products/{product}/updateFeatured', [ProductController::class, 'updateFeatured'])->name('products.updateFeatured');

    // Industry Gallery
    Route::resource('industry_gallery', IndustryGalleryController::class)->except(['show']);
    Route::post('/industry_gallery/{id}/updateFeatured', [IndustryGalleryController::class, 'updateFeatured'])->name('industry_gallery.updateFeatured');

    // Kelola Admin
    Route::resource('admins', AdminManageController::class)->except(['show']);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});