<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Founder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FounderController extends Controller
{
    public function index()
    {
        $founders = Founder::first();
        return view('admin.home.founder.index', compact('founders'));
    }

    public function create()
    {
        return view('admin.home.founder.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            // 1️⃣ Simpan di storage/app/public/founder
            $path = $request->file('image')->store('founder', 'public');
            $data['image'] = $path;

            // 2️⃣ Copy ke public/uploads/founder
            $source = storage_path('app/public/' . $path);
            $destination = public_path('uploads/' . $path);

            // Buat folder tujuan jika belum ada
            if (!file_exists(dirname($destination))) {
                mkdir(dirname($destination), 0777, true);
            }

            // Salin file
            copy($source, $destination);
        }

        Founder::create($data);

        return redirect()->route('admin.home.founder.index')->with('success', 'Founder berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $founders = Founder::findOrFail($id);
        return view('admin.home.founder.edit', compact('founders'));
    }

    public function update(Request $request, $id)
    {
        $founders = Founder::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            // 1️⃣ Simpan di storage/app/public/founder
            $path = $request->file('image')->store('founder', 'public');
            $data['image'] = $path;

            // 2️⃣ Copy ke public/uploads/founder
            $source = storage_path('app/public/' . $path);
            $destination = public_path('uploads/' . $path);

            if (!file_exists(dirname($destination))) {
                mkdir(dirname($destination), 0777, true);
            }

            copy($source, $destination);
        }

        $founders->update($data);

        return redirect()->route('admin.home.founder.index')->with('success', 'Founder berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $founders = Founder::findOrFail($id);

        // Hapus juga dari kedua lokasi (jika ada)
        if ($founders->image) {
            Storage::disk('public')->delete($founders->image);

            $uploadsPath = public_path('uploads/' . $founders->image);
            if (file_exists($uploadsPath)) {
                unlink($uploadsPath);
            }
        }

        $founders->delete();

        return redirect()->route('admin.home.founder.index')->with('success', 'Founder berhasil dihapus.');
    }
}
