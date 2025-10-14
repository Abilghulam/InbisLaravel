<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\FileHelper;

class ProductController extends Controller
{
   public function index($category = 'hp')
    {
        // Validasi kategori yang diperbolehkan
        $validCategories = ['hp', 'laptop', 'pc', 'accessories'];
        if (!in_array($category, $validCategories)) {
            abort(404);
        }

        // Ambil produk berdasarkan kategori
        $products = Product::where('category', $category)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Kirim data ke view
        return view('admin.product.index', [
            'title' => ucfirst($category),
            'products' => $products,
            'category' => $category,
        ]);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
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

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $product = new Product();
        $product->fill($request->only([
            'name', 'brand', 'category', 'level', 'section', 'stock', 'old_price', 'specs'
        ]));

        if ($request->section === 'promo') {
            $product->discount = $request->discount;
            $product->price    = $request->old_price - ($request->old_price * $request->discount / 100);
        } else {
            $product->discount = null;
            $product->price    = $request->old_price;
        }

        if ($request->hasFile('image')) {
            $product->image = FileHelper::uploadToRootUploads(
                $request->file('image'),
                "product/{$product->category}"
            );
        }

        $product->save();

        return redirect()
            ->route('admin.product.index', ['category' => $product->category])
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
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

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $product = Product::findOrFail($id);
        $product->fill($request->only([
            'name', 'brand', 'category', 'level', 'section', 'stock', 'old_price', 'specs'
        ]));

        // Hitung harga
        if ($request->section === 'promo') {
            $product->discount = $request->discount;
            $product->price = $request->old_price - ($request->old_price * $request->discount / 100);
        } else {
            $product->discount = null;
            $product->price = $request->old_price;
        }

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            if ($product->image) {
                FileHelper::deleteFromBoth($product->image);
            }

            $product->image = FileHelper::uploadToRootUploads(
                $request->file('image'),
                "product/{$product->category}"
            );
        }

        $product->save();

        // ================================
        // 🔁 Redirect ke halaman & kategori semula
        // ================================
        $category = $request->input('category', $product->category);
        $page = $request->input('page', 1);

        return redirect()
            ->route('admin.product.index', [
                'category' => $category,
                'page' => $page,
            ])
            ->with('success', "Produk kategori {$category} berhasil diperbarui.");
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $category = $product->category; // simpan dulu kategorinya sebelum dihapus

        if ($product->image) {
            FileHelper::deleteFromBoth($product->image);
        }

        $product->delete();

        return redirect()
            ->route('admin.product.index', ['category' => $category])
            ->with('success', "Produk kategori {$category} berhasil dihapus.");
    }
}
