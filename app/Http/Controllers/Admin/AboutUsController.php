<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = AboutUs::first(); // cuma satu data
        return view('admin.home.about.index', compact('about'));
    }

    public function create()
    {
        return view('admin.home.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description'      => 'required|string',
            'rating'           => 'required|numeric|min:0|max:5',
            'years_experience' => 'required|integer|min:0',
            'brand_partners'   => 'required|integer|min:0',
            'retail_stores'    => 'required|integer|min:0',
        ]);

        AboutUs::create($request->all());

        return redirect()->route('about-us.index')->with('success', 'About Us berhasil ditambahkan');
    }

    public function edit($id)
    {
        $about = AboutUs::findOrFail($id);
        return view('admin.home.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description'      => 'required|string',
            'rating'           => 'required|numeric|min:0|max:5',
            'years_experience' => 'required|integer|min:0',
            'brand_partners'   => 'required|integer|min:0',
            'retail_stores'    => 'required|integer|min:0',
        ]);

        $about = AboutUs::findOrFail($id);
        $about->update($request->all());

        return redirect()->route('about-us.index')->with('success', 'About Us berhasil diperbarui');
    }

    public function destroy($id)
    {
        $about = AboutUs::findOrFail($id);
        $about->delete();

        return redirect()->route('about-us.index')->with('success', 'About Us berhasil dihapus');
    }
}
