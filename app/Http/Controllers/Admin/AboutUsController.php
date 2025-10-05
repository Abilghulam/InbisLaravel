<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $about_us = AboutUs::first();
        return view('admin.home.about.index', compact('about_us'));
    }

    public function create()
    {
        return view('admin.home.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description'     => 'required|string',
            'video_url'       => 'nullable|string|max:255',
            'rating'          => 'required|numeric|min:0|max:5',
            'reviews_count'   => 'nullable|integer|min:0',
            'years_experience'=> 'required|integer|min:0',
            'brand_partners'  => 'required|integer|min:0',
            'retail_stores'   => 'required|integer|min:0',
        ]);

        $data = $request->only([
            'description',
            'rating',
            'experience_years',
            'brand_partners',
            'retail_stores',
            'video_url',
            'reviews_count',
        ]);

        AboutUs::create($request->all());

        return redirect()->route('admin.home.about.index')->with('success', 'About berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $about_us = AboutUs::findOrFail($id);
        return view('admin.home.about.edit', compact('about_us'));
    }

    public function update(Request $request, $id)
    {
        $about_us = AboutUs::findOrFail($id);

        $request->validate([
            'description'     => 'required|string',
            'video_url'       => 'nullable|string|max:255',
            'rating'          => 'required|numeric|min:0|max:5',
            'reviews_count'   => 'nullable|integer|min:0',
            'years_experience'=> 'required|integer|min:0',
            'brand_partners'  => 'required|integer|min:0',
            'retail_stores'   => 'required|integer|min:0',
        ]);

        $about_us->update($request->all());

        return redirect()->route('admin.home.about.index')->with('success', 'About berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $about_us = AboutUs::findOrFail($id);
        $about_us->delete();

        return redirect()->route('admin.home.about.index')->with('success', 'About berhasil dihapus.');
    }
}
