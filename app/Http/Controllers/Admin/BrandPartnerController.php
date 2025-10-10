<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandPartner;
use Illuminate\Http\Request;
use App\Helpers\FileHelper; 

class BrandPartnerController extends Controller
{
    public function index()
    {
        $brand_partners = BrandPartner::all();
        return view('admin.home.brand.index', compact('brand_partners'));
    }

    public function create()
    {
        return view('admin.home.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|max:2048',
        ]);

        $data = $request->only(['name']);

        if ($request->hasFile('logo')) {
            $data['logo'] = FileHelper::uploadToRootUploads($request->file('logo'), 'brands');
        }

        BrandPartner::create($data);

        return redirect()->route('admin.home.brand.index')
            ->with('success', 'Brand berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $brand_partners = BrandPartner::findOrFail($id);
        return view('admin.home.brand.edit', compact('brand_partners'));
    }

    public function update(Request $request, $id)
    {
        $brand_partners = BrandPartner::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name']);

        if ($request->hasFile('logo')) {
            // hapus file lama
            FileHelper::deleteFromBoth($brand_partners->logo);

            // upload file baru
            $data['logo'] = FileHelper::uploadToRootUploads($request->file('logo'), 'brands');
        }

        $brand_partners->update($data);

        return redirect()->route('admin.home.brand.index')
            ->with('success', 'Brand berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $brand_partners = BrandPartner::findOrFail($id);

        // hapus file logo juga
        FileHelper::deleteFromBoth($brand_partners->logo);

        $brand_partners->delete();

        return redirect()->route('admin.home.brand.index')
            ->with('success', 'Brand berhasil dihapus.');
    }
}
