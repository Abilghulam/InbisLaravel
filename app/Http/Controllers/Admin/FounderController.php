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

        $data = $request->only(['name','description']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('founder', 'public');
        }

        Founder::create($data);

        return redirect()->route('admin.home.founder.index')->with('success', 'Founder berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $founder = Founder::findOrFail($id);
        return view('admin.home.founder.edit', compact('founder'));
    }

    public function update(Request $request, $id)
    {
        $founder = Founder::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name','description']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('founder', 'public');
        }

        $founder->update($data);

        return redirect()->route('admin.home.founder.index')->with('success', 'Founder berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $founder = Founder::findOrFail($id);
        $founder->delete();

        return redirect()->route('admin.home.founder.index')->with('success', 'Founder berhasil dihapus.');
    }
}
