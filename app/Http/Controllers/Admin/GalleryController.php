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
            // Path ke folder uploads/gallery di root (bukan public)
            $folderPath = base_path('uploads/gallery');

            // Buat folder kalau belum ada
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0775, true);
            }

            // Buat nama file unik
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();

            // Pindahkan file ke /uploads/gallery
            $request->file('image')->move($folderPath, $fileName);

            // Simpan path relatif ke database
            $data['image'] = 'uploads/gallery/' . $fileName;
        }

        Gallery::create($data);

        return redirect()->route('admin.home.gallery.index')
            ->with('success', 'Gambar berhasil ditambahkan.');
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
            $folderPath = base_path('uploads/gallery');

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0775, true);
            }

            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($folderPath, $fileName);

            $data['image'] = 'uploads/gallery/' . $fileName;
        }

        $galleries->update($data);

        return redirect()->route('admin.home.gallery.index')
            ->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galleries = Gallery::findOrFail($id);
        $galleries->delete();

        return redirect()->route('admin.home.gallery.index')
            ->with('success', 'Gambar berhasil dihapus.');
    }
}
