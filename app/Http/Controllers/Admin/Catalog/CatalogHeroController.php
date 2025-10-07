<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use App\Models\CatalogHero;
use Illuminate\Http\Request;

class CatalogHeroController extends Controller
{
    public function index()
    {
        $heroes = CatalogHero::all();
        return view('admin.catalog.hero.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.catalog.hero.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category' => 'required|string|in:hp,laptop,pc,accessories',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        $data['image'] = $request->file('image')->store('catalog/hero', 'public');
        CatalogHero::create($data);

        return redirect()->route('admin.catalog.hero.index')->with('success', 'Hero berhasil ditambahkan.');
    }

    public function edit(CatalogHero $hero)
    {
        return view('admin.catalog.hero.edit', compact('hero'));
    }

    public function update(Request $request, CatalogHero $hero)
    {
        $data = $request->validate([
            'category' => 'required|string|in:hp,laptop,pc,accessories',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('catalog/hero', 'public');
        }

        $hero->update($data);
        return redirect()->route('admin.catalog.hero.index')->with('success', 'Hero berhasil diperbarui.');
    }

    public function destroy(CatalogHero $hero)
    {
        $hero->delete();
        return back()->with('success', 'Hero berhasil dihapus.');
    }
}

