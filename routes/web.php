<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

// ==================
// 🏠 Halaman Utama
// ==================
Route::get('/', function () {
    return view('home', ['title' => 'Home - Indo Bismar Group']);
})->name('home');

// ==================
// 📦 Catalog Dinamis
// ==================
// Semua kategori: hp, laptop, pc, accessories
Route::get('/catalog/{type}', [CatalogController::class, 'show'])
    ->where('type', 'hp|laptop|pc|accessories')
    ->name('catalog.show');

// 🔎 Pencarian + filter + sort
Route::get('/search/{type}', [CatalogController::class, 'search'])
    ->where('type', 'hp|laptop|pc|accessories')
    ->name('catalog.search');

// ==================
// 🔀 Redirect lama (opsional)
// ==================
// Agar URL lama tetap jalan (tidak 404)
Route::redirect('/catalog-hp', '/catalog/hp');
Route::redirect('/catalog-laptop', '/catalog/laptop');
Route::redirect('/catalog-pc', '/catalog/pc');
Route::redirect('/catalog-accessories', '/catalog/accessories');
