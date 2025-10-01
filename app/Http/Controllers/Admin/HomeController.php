<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class HomeController extends Controller
{
    /**
     * Menampilkan daftar banner
     */
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('admin.home.index', compact('banners'));
    }

    /**
     * Form tambah banner
     */
    public function create()
    {
        return view('admin.home.create');
    }

    /**
     * Simpan banner baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('banners', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        Banner::create($data);

        return redirect()->route('home.index')->with('success', 'Banner berhasil ditambahkan.');
    }

    /**
     * Form edit banner
     */
    public function edit(Banner $home)
    {
        return view('admin.home.edit', compact('home'));
    }

    /**
     * Update banner
     */
    public function update(Request $request, Banner $home)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('banners', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $home->update($data);

        return redirect()->route('home.index')->with('success', 'Banner berhasil diperbarui.');
    }

    /**
     * Hapus banner
     */
    public function destroy(Banner $home)
    {
        $home->delete();
        return redirect()->route('home.index')->with('success', 'Banner berhasil dihapus.');
    }
}
