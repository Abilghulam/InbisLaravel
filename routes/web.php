<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Auth\OtpController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\AdminController; 

// 🏠 Halaman Utama
Route::get('/', function () {
    return view('home', ['title' => 'Home - Indo Bismar Group']);
})->name('home');

// 📦 Catalog Dinamis
Route::get('/catalog/{type}', [CatalogController::class, 'show'])
    ->where('type', 'hp|laptop|pc|accessories')
    ->name('catalog.show');

// 🔎 Fitur Search
Route::get('/search/{type}', [CatalogController::class, 'search'])
    ->where('type', 'hp|laptop|pc|accessories')
    ->name('catalog.search');

// 🔀 Redirect Routes Lama (SEO friendly)
Route::redirect('/catalog-hp', '/catalog/hp');
Route::redirect('/catalog-laptop', '/catalog/laptop');
Route::redirect('/catalog-pc', '/catalog/pc');
Route::redirect('/catalog-accessories', '/catalog/accessories');

// 🔐 Admin Authentication
Route::get('/login-page', [AuthController::class, 'showLoginForm'])->name('login.page');

// Proses login (dibatasi 5x percobaan per menit → cegah brute force)
Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔑 OTP Verification (2FA)
Route::middleware(['auth'])->group(function () {
    Route::get('/verify-otp', [OtpController::class, 'showVerifyForm'])->name('otp.form');
    Route::post('/verify-otp', [OtpController::class, 'verify'])->name('otp.verify');
    Route::post('/resend-otp', [OtpController::class, 'resend'])->name('otp.resend');
});

// 📊 Admin Dashboard (hanya admin + OTP sudah verified)
Route::middleware(['auth', 'admin', 'otp.verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // CRUD Home Management
    Route::prefix('home')->group(function () {
        Route::resource('/about-us', \App\Http\Controllers\Admin\AboutUsController::class);
        Route::resource('/founders', \App\Http\Controllers\Admin\FounderController::class);
        Route::resource('/galleries', \App\Http\Controllers\Admin\GalleryController::class);
        Route::resource('/brand-partners', \App\Http\Controllers\Admin\BrandPartnerController::class);
        Route::resource('/retail-stores', \App\Http\Controllers\Admin\RetailStoreController::class);
        Route::resource('/customer-reviews', \App\Http\Controllers\Admin\CustomerReviewController::class);
    });

    // CRUD Catalog Management
    Route::resource('/catalog', \App\Http\Controllers\Admin\CatalogController::class);
});

// Test Email Route
Route::get('/tes-email', function () {
    try {
        Mail::raw('Tes kirim email via Gmail SMTP di Laravel Indo Bismar', function ($message) {
            $message->to('abilghlm@gmail.com')
                    ->subject('Tes Email Indo Bismar');
        });
        return "Email berhasil dikirim!";
    } catch (\Exception $e) {
        return "Gagal kirim email. Error: " . $e->getMessage();
    }
});

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
