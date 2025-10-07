<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use App\Models\CatalogPromo;
use Illuminate\Http\Request;

class CatalogPromoController extends Controller
{
    /**
     * Tampilkan halaman kelola promo title (global)
     */
    public function index()
    {
        $promo_title = CatalogPromo::first(); 
        return view('admin.catalog.promo.index', compact('promo_title'));
    }

    /**
     * Form tambah promo title (jika belum ada)
     */
    public function create()
    {
        // Jika sudah ada promo title, redirect ke edit saja
        $promo_title = CatalogPromo::first();
        if ($promo_title) {
            return redirect()->route('admin.catalog.promo.edit', $promo_title->id);
        }

        return view('admin.catalog.promo.create');
    }

    /**
     * Simpan promo title baru
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
        ]);

        CatalogPromo::create($data);
        return redirect()->route('admin.catalog.promo.index')->with('success', 'Judul promo berhasil ditambahkan.');
    }

    /**
     * Form edit promo title
     */
    public function edit(CatalogPromo $promo)
    {
        return view('admin.catalog.promo.edit', ['promo_title' => $promo]);
    }

    /**
     * Update promo title
     */
    public function update(Request $request, CatalogPromo $promo)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
        ]);

        $promo->update($data);
        return redirect()->route('admin.catalog.promo.index')->with('success', 'Judul promo berhasil diperbarui.');
    }

    /**
     * Hapus promo title
     */
    public function destroy(CatalogPromo $promo)
    {
        $promo->delete();
        return back()->with('success', 'Judul promo berhasil dihapus.');
    }
}
