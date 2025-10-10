<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Founder;
use Illuminate\Http\Request;

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
            // Simpan langsung ke /uploads/founder di root
            $folderPath = base_path('uploads/founder');

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0775, true);
            }

            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($folderPath, $fileName);

            // Simpan path relatif untuk database
            $data['image'] = 'uploads/founder/' . $fileName;
        }

        Founder::create($data);

        return redirect()->route('admin.home.founder.index')
            ->with('success', 'Founder berhasil ditambahkan.');
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
            $folderPath = base_path('uploads/founder');

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0775, true);
            }

            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($folderPath, $fileName);

            $data['image'] = 'uploads/founder/' . $fileName;
        }

        $founders->update($data);

        return redirect()->route('admin.home.founder.index')
            ->with('success', 'Founder berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $founders = Founder::findOrFail($id);

        if ($founders->image) {
            $path = base_path($founders->image);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $founders->delete();

        return redirect()->route('admin.home.founder.index')
            ->with('success', 'Founder berhasil dihapus.');
    }
}
