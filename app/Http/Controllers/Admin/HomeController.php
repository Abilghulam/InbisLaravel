<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\Founder;
use App\Models\Gallery;
use App\Models\BrandPartner;
use App\Models\RetailStore;
use App\Models\CustomerReview;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman utama Kelola Home
     */
    public function index()
    {
        $about   = AboutUs::first();
        $founder = Founder::first(); 
        $gallery = Gallery::all();
        $brands  = BrandPartner::all();
        $stores  = RetailStore::all();
        $reviews = CustomerReview::latest()->get();

        return view('admin.home.index', compact(
            'about', 'founder', 'gallery', 'brands', 'stores', 'reviews'
        ));
    }
}
