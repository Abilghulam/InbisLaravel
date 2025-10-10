<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.home.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.home.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
        ]);

        $data = $request->only(['title']);

        if ($request->hasFile('image')) {
            $path = 'uploads/gallery';
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path($path), $fileName);
            $data['image'] = 'gallery/' . $fileName;
        }

        Gallery::create($data);

        return redirect()->route('admin.home.gallery.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $galleries = Gallery::findOrFail($id);
        return view('admin.home.gallery.edit', compact('galleries'));
    }

    public function update(Request $request, $id)
    {
        $galleries = Gallery::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title']);

        if ($request->hasFile('image')) {
            $path = 'uploads/gallery';
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path($path), $fileName);
            $data['image'] = 'gallery/' . $fileName;
        }

        $galleries->update($data);

        return redirect()->route('admin.home.gallery.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galleries = Gallery::findOrFail($id);
        $galleries->delete();

        return redirect()->route('admin.home.gallery.index')->with('success', 'Gambar berhasil dihapus.');
    }
}
