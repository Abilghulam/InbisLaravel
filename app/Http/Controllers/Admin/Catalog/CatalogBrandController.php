<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use App\Models\CatalogBrand;
use Illuminate\Http\Request;

class CatalogBrandController extends Controller
{
    public function index()
    {
        $brands = CatalogBrand::all();
        return view('admin.catalog.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.catalog.brand.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category' => 'required|string|in:hp,laptop,pc,accessories',
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['image'] = $request->file('image')->store('catalog/brand', 'public');
        CatalogBrand::create($data);

        return redirect()->route('admin.catalog.brand.index')->with('success', 'Brand berhasil ditambahkan.');
    }

    public function edit(CatalogBrand $brand)
    {
        return view('admin.catalog.brand.edit', compact('brand'));
    }

    public function update(Request $request, CatalogBrand $brand)
    {
        $data = $request->validate([
            'category' => 'required|string|in:hp,laptop,pc,accessories',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('catalog/brand', 'public');
        }

        $brand->update($data);
        return redirect()->route('admin.catalog.brand.index')->with('success', 'Brand berhasil diperbarui.');
    }

    public function destroy(CatalogBrand $brand)
    {
        $brand->delete();
        return back()->with('success', 'Brand berhasil dihapus.');
    }
}
