<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman utama (frontend)
     */
public function index()
{
    $about_us = \App\Models\AboutUs::first();
    $founders = \App\Models\Founder::first();
    $galleries = \App\Models\Gallery::latest()->take(10)->get(); 
    $brand_partners = \App\Models\BrandPartner::all();
    $retail_stores = \App\Models\RetailStore::all();
    $customer_reviews = \App\Models\CustomerReview::latest()->get();

    return view('home', compact(
        'about_us',
        'founders',
        'galleries',
        'brand_partners',
        'retail_stores',
        'customer_reviews'
    ))->with('title', 'Home - Indo Bismar Group');
}

}