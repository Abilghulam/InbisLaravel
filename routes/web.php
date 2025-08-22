<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home - Indo Bismar Group']);
});

Route::get('/catalog', function () {
    return view('catalog', ['title' => 'Catalog - Indo Bismar Group']);
})->name('catalog');
