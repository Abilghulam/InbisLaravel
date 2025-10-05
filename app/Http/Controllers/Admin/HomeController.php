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
        $about_us   = AboutUs::first();
        $founders = Founder::first(); 
        $galleries = Gallery::all();
        $brand_partners  = BrandPartner::all();
        $retail_stores  = RetailStore::all();
        $customer_reviews = CustomerReview::latest()->get();

        return view('admin.home.index', compact(
            'about_us', 'founders', 'galleries', 'brand_partners', 'retail_stores', 'customer_reviews'
        ));
    }
}
