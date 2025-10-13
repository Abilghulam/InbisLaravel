<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CatalogHero; 
use App\Models\CatalogPromo;
use App\Models\CatalogBrand;

class CatalogController extends Controller
{
    /**
     * Menampilkan halaman catalog dinamis berdasarkan kategori (hp, laptop, pc, accessories)
     */
    public function show($type)
    {
        $allowed = ['hp', 'laptop', 'pc', 'accessories'];
        if (!in_array($type, $allowed)) {
            abort(404);
        }

        // Ambil hero sesuai kategori
        $heroes = CatalogHero::where('category', $type)->get();

        // Ambil promo title global (terbaru)
        $promo_title = CatalogPromo::latest()->first();

        // Ambil brand category berdasarkan kategori
        $brands = CatalogBrand::where('category', $type)->get();

        $recommendations = Product::where('category', $type)
            ->where('section', 'recommendation')
            ->take()
            ->get();

        // Promo Section
        $promos = Product::where('category', $type)
            ->where('section', 'promo')
            ->take(8)
            ->get();

        $latest = Product::where('category', $type)
            ->where('section', 'latest')
            ->take(8)
            ->get();

        $products = Product::where('category', $type)
            ->where('section', 'product')
            ->paginate(15);

        return view('catalog', compact(
            'type',
            'heroes',
            'recommendations',
            'promos',
            'latest',
            'products',
            'promo_title',
            'brands'
        ));
    }

    /**
     * Search produk di catalog berdasarkan kategori
     */
    public function search(Request $request, $type)
    {
        $allowed = ['hp', 'laptop', 'pc', 'accessories'];
        if (!in_array($type, $allowed)) {
            abort(404);
        }

        if ($request->has('clear')) {
            return redirect()->route('catalog.search', $type);
        }

        $keyword      = $request->input('q');
        $priceFilters = $request->input('price', []);   
        $brands       = $request->input('brand', []);  
        $levels       = $request->input('level', []);  
        $stocks       = $request->input('stock', []); 
        $minPrice     = $request->input('minPrice');  
        $maxPrice     = $request->input('maxPrice');    
        $sort         = $request->input('sort');       

        $results = Product::query()
            ->where('category', $type)
            ->whereIn('section', ['recommendation', 'promo', 'latest', 'product'])

            ->when($keyword, function ($query, $keyword) {
                $query->whereFullText(['name', 'brand', 'specs'], $keyword, ['mode' => 'boolean']);
            })
            ->when(!empty($brands), fn($query) => $query->whereIn('brand', $brands))
            ->when(!empty($levels), fn($query) => $query->whereIn('level', $levels))
            ->when(!empty($stocks), function ($query) use ($stocks) {
                $query->where(function ($q) use ($stocks) {
                    if (in_array('tersedia', $stocks)) {
                        $q->orWhere('stock', '>', 0);
                    }
                    if (in_array('habis', $stocks)) {
                        $q->orWhere('stock', '=', 0);
                    }
                });
            })
            ->when(!empty($priceFilters), function ($query) use ($priceFilters) {
                $query->where(function ($q) use ($priceFilters) {
                    foreach ($priceFilters as $filter) {
                        if ($filter === 'under-2jt') {
                            $q->orWhere('price', '<', 2000000);
                        } elseif ($filter === '2-5jt') {
                            $q->orWhereBetween('price', [2000000, 5000000]);
                        } elseif ($filter === 'above-5jt') {
                            $q->orWhere('price', '>', 5000000);
                        }
                    }
                });
            })
            ->when($minPrice, fn($query, $minPrice) => $query->where('price', '>=', $minPrice))
            ->when($maxPrice, fn($query, $maxPrice) => $query->where('price', '<=', $maxPrice))
            ->when($sort === 'price-asc', fn($query) => $query->orderBy('price', 'asc'))
            ->when($sort === 'price-desc', fn($query) => $query->orderBy('price', 'desc'))
            ->when($sort === 'newest', fn($query) => $query->orderBy('created_at', 'desc'))
            ->when($sort === 'default' || is_null($sort), function ($query) use ($keyword) {
                if ($keyword) {
                    $query->selectRaw(
                        "products.*, MATCH(name, brand, specs) AGAINST (? IN BOOLEAN MODE) as relevance",
                        [$keyword]
                    )->orderByDesc('relevance');
                }
            })
            ->paginate(15)
            ->appends($request->except('page'));

        $results->getCollection()->transform(function ($product) {
            if ($product->section === 'promo' && !empty($product->old_price) && $product->old_price > $product->price) {
                $product->discount = round((($product->old_price - $product->price) / $product->old_price) * 100);
            } else {
                $product->discount = null;
            }
            return $product;
        });

        return view('search-catalog', compact('type', 'results', 'keyword'));
    }
}
