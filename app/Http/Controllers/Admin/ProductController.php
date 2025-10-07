<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $hp = Product::where('category', 'hp')->latest()->paginate(10, ['*'], 'hp_page');
        $laptop = Product::where('category', 'laptop')->latest()->paginate(10, ['*'], 'laptop_page');
        $pc = Product::where('category', 'pc')->latest()->paginate(10, ['*'], 'pc_page');
        $accessories = Product::where('category', 'accessories')->latest()->paginate(10, ['*'], 'accessories_page');

        return view('admin.product.index', compact('hp', 'laptop', 'pc', 'accessories'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'brand'     => 'required|string|max:255',
            'category'  => 'required|string',
            'level'     => 'required|string',
            'section'   => 'required|string',
            'stock'     => 'required|string',
            'old_price' => 'nullable|numeric|min:0',
            'discount'  => $request->section === 'promo'
                            ? 'required|integer|min:0|max:100'
                            : 'nullable|integer|min:0|max:100',
            'price'     => $request->section === 'promo'
                            ? 'required|numeric|min:0'
                            : 'nullable|numeric|min:0',
            'specs'     => 'nullable|string',
            'image'     => 'nullable|image|max:2048',
        ]);

        $product = new Product();
        $product->name      = $request->name;
        $product->brand     = $request->brand;
        $product->category  = $request->category;
        $product->level     = $request->level;
        $product->section   = $request->section;
        $product->stock     = $request->stock;
        $product->old_price = $request->old_price;
        $product->specs     = $request->specs;

        // hitung harga
        if ($request->section === 'promo') {
            $product->discount = $request->discount;
            $product->price    = $request->old_price - ($request->old_price * $request->discount / 100);
        } else {
            $product->discount = null;
            $product->price    = $request->old_price;
        }

        // simpan gambar
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'brand'     => 'required|string|max:255',
            'category'  => 'required|string',
            'level'     => 'required|string',
            'section'   => 'required|string',
            'stock'     => 'required|string',
            'old_price' => 'nullable|numeric|min:0',
            'discount'  => $request->section === 'promo'
                            ? 'required|integer|min:0|max:100'
                            : 'nullable|integer|min:0|max:100',
            'price'     => $request->section === 'promo'
                            ? 'required|numeric|min:0'
                            : 'nullable|numeric|min:0',
            'specs'     => 'nullable|string',
            'image'     => 'nullable|image|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->name      = $request->name;
        $product->brand     = $request->brand;
        $product->category  = $request->category;
        $product->level     = $request->level;
        $product->section   = $request->section;
        $product->stock     = $request->stock;
        $product->old_price = $request->old_price;
        $product->specs     = $request->specs;

        // hitung harga
        if ($request->section === 'promo') {
            $product->discount = $request->discount;
            $product->price    = $request->old_price - ($request->old_price * $request->discount / 100);
        } else {
            $product->discount = null;
            $product->price    = $request->old_price;
        }

        // hapus gambar lama & simpan baru
        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
                $deleted = true;
            }
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

        return redirect()->route('admin.product.index')->with('success',
            'Produk berhasil diperbarui.' . (!empty($deleted) ? ' Gambar lama dihapus.' : '')
        );
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Produk beserta gambarnya berhasil dihapus.');
    }
}
