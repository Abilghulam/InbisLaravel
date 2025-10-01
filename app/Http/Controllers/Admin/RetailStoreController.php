<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RetailStore;
use Illuminate\Http\Request;

class RetailStoreController extends Controller
{
    public function index()
    {
        $retail_stores = RetailStore::all();
        return view('admin.home.store.index', compact('retail_stores'));
    }

    public function create()
    {
        return view('admin.home.store.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'address'     => 'required|string',
            'social_media'=> 'nullable|string',
            'iframe'      => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name','description','address','social_media','iframe']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('stores', 'public');
        }

        RetailStore::create($data);

        return redirect()->route('admin.home.store.index')->with('success', 'Store berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $store = RetailStore::findOrFail($id);
        return view('admin.home.store.edit', compact('store'));
    }

    public function update(Request $request, $id)
    {
        $store = RetailStore::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'address'     => 'required|string',
            'social_media'=> 'nullable|string',
            'iframe'      => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name','description','address','social_media','iframe']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('stores', 'public');
        }

        $store->update($data);

        return redirect()->route('admin.home.store.index')->with('success', 'Store berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $store = RetailStore::findOrFail($id);
        $store->delete();

        return redirect()->route('admin.home.store.index')->with('success', 'Store berhasil dihapus.');
    }
}
