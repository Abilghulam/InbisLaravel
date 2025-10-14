<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;

// ===============================
// 🏠 Halaman Utama (User) — Dinamis dari DB
// ===============================
Route::get('/', [HomeController::class, 'index'])->name('home');

// ===============================
// 📦 Catalog Dinamis (Frontend)
// ===============================
Route::get('/catalog/{type}', [CatalogController::class, 'show'])
    ->where('type', 'hp|laptop|pc|accessories')
    ->name('catalog.show');

Route::get('/search/{type}', [CatalogController::class, 'search'])
    ->where('type', 'hp|laptop|pc|accessories')
    ->name('catalog.search');

// 🔀 Redirect lama (SEO)
Route::redirect('/catalog-hp', '/catalog/hp');
Route::redirect('/catalog-laptop', '/catalog/laptop');
Route::redirect('/catalog-pc', '/catalog/pc');
Route::redirect('/catalog-accessories', '/catalog/accessories');

// ===============================
// 🔐 Admin Authentication
// ===============================
Route::get('/login-page', [AuthController::class, 'showLoginForm'])->name('login.page');
Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔑 OTP Verification (2FA)
Route::middleware(['auth'])->group(function () {
    Route::get('/verify-otp', [OtpController::class, 'showVerifyForm'])->name('otp.form');
    Route::post('/verify-otp', [OtpController::class, 'verify'])->name('otp.verify');
    Route::post('/resend-otp', [OtpController::class, 'resend'])->name('otp.resend');
});

// ===============================
// 📊 Admin Dashboard & Management
// ===============================
Route::middleware(['auth', 'admin', 'otp.verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // CRUD Home Management
        Route::prefix('home')->name('home.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('index');
            Route::resource('about',  \App\Http\Controllers\Admin\AboutUsController::class);
            Route::resource('founder', \App\Http\Controllers\Admin\FounderController::class);
            Route::resource('gallery', \App\Http\Controllers\Admin\GalleryController::class);
            Route::resource('brand',   \App\Http\Controllers\Admin\BrandPartnerController::class);
            Route::resource('store',   \App\Http\Controllers\Admin\RetailStoreController::class);
            Route::resource('review',  \App\Http\Controllers\Admin\CustomerReviewController::class);
        });

        // CRUD Product Management (dengan kategori opsional)
        Route::get('product/{category?}', [\App\Http\Controllers\Admin\ProductController::class, 'index'])
            ->where('category', 'hp|laptop|pc|accessories')
            ->name('product.index');
        Route::resource('product', \App\Http\Controllers\Admin\ProductController::class)->except(['index']);

        // CRUD Catalog Management (Hero, Promo, Brand)
        Route::prefix('catalog')->name('catalog.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\Catalog\CatalogController::class, 'index'])->name('index');
            Route::resource('hero', \App\Http\Controllers\Admin\Catalog\CatalogHeroController::class);
            Route::resource('promo', \App\Http\Controllers\Admin\Catalog\CatalogPromoController::class);
            Route::resource('brand', \App\Http\Controllers\Admin\Catalog\CatalogBrandController::class);
        });
    });

// ===============================
// 📧 Test Email
// ===============================
Route::get('/tes-email', function () {
    try {
        Mail::raw('Tes kirim email via Gmail SMTP di Laravel Indo Bismar', function ($message) {
            $message->to('abilghlm@gmail.com')->subject('Tes Email Indo Bismar');
        });
        return "Email berhasil dikirim!";
    } catch (\Exception $e) {
        return "Gagal kirim email. Error: " . $e->getMessage();
    }
});

// ===============================
// 🔑 Forgot / Reset Password
// ===============================
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
