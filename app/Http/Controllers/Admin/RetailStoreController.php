<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RetailStore;
use Illuminate\Http\Request;
use App\Helpers\FileHelper; 

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
            'name'       => 'required|string|max:255',
            'address'    => 'required|string',
            'facebook'   => 'nullable|string|max:255',
            'instagram'  => 'nullable|string|max:255',
            'map_iframe' => 'nullable|string',
            'image'      => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'address', 'facebook', 'instagram', 'map_iframe']);

        if ($request->hasFile('image')) {
            // Upload pakai helper ke folder /uploads/stores
            $data['image'] = FileHelper::uploadToRootUploads($request->file('image'), 'stores');
        }

        RetailStore::create($data);

        return redirect()->route('admin.home.store.index')
            ->with('success', 'Retail store berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $retail_stores = RetailStore::findOrFail($id);
        return view('admin.home.store.edit', compact('retail_stores'));
    }

    public function update(Request $request, $id)
    {
        $retail_stores = RetailStore::findOrFail($id);

        $request->validate([
            'name'       => 'required|string|max:255',
            'address'    => 'required|string',
            'facebook'   => 'nullable|string|max:255',
            'instagram'  => 'nullable|string|max:255',
            'map_iframe' => 'nullable|string',
            'image'      => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'address', 'facebook', 'instagram', 'map_iframe']);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($retail_stores->image) {
                FileHelper::deleteFromBoth($retail_stores->image);
            }

            // Upload gambar baru
            $data['image'] = FileHelper::uploadToRootUploads($request->file('image'), 'stores');
        }

        $retail_stores->update($data);

        return redirect()->route('admin.home.store.index')
            ->with('success', 'Retail store berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $retail_stores = RetailStore::findOrFail($id);

        // Hapus file image jika ada
        if ($retail_stores->image) {
            FileHelper::deleteFromBoth($retail_stores->image);
        }

        $retail_stores->delete();

        return redirect()->route('admin.home.store.index')
            ->with('success', 'Retail store berhasil dihapus.');
    }
}
