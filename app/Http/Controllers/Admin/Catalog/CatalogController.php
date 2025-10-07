<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Tampilkan halaman utama pengelolaan catalog
     */
    public function index()
    {
        return view('admin.catalog.index');
    }
}
