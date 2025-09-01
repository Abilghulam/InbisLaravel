<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home - Indo Bismar Group']);
})->name('home');

Route::get('/catalog-laptop', function () {
    return view('catalog-laptop', ['title' => 'Catalog - Indo Bismar Group']);
})->name('catalog-laptop');

Route::get('/catalog-pc', function () {
    return view('catalog-pc', ['title' => 'Catalog - Indo Bismar Group']);
})->name('catalog-pc');

Route::get('/catalog-hp', function () {
    return view('catalog-hp', ['title' => 'Catalog - Indo Bismar Group']);
})->name('catalog-hp');

Route::get('/catalog-accessories', function () {
    return view('catalog-accessories', ['title' => 'Catalog - Indo Bismar Group']);
})->name('catalog-accessories');
