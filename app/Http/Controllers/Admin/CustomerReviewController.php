<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerReview;
use Illuminate\Http\Request;

class CustomerReviewController extends Controller
{
    public function index()
    {
        $customer_reviews = CustomerReview::all();
        return view('admin.home.review.index', compact('customer_reviews'));
    }

    public function create()
    {
        return view('admin.home.review.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'rating'  => 'required|integer|min:1|max:5',
            'date'    => 'required|date',
            'content' => 'required|string',
        ]);

        CustomerReview::create($request->all());

        return redirect()->route('admin.home.review.index')->with('success', 'Review berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $review = CustomerReview::findOrFail($id);
        return view('admin.home.review.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $review = CustomerReview::findOrFail($id);

        $request->validate([
            'name'    => 'required|string|max:255',
            'rating'  => 'required|integer|min:1|max:5',
            'date'    => 'required|date',
            'content' => 'required|string',
        ]);

        $review->update($request->all());

        return redirect()->route('admin.home.review.index')->with('success', 'Review berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $review = CustomerReview::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.home.review.index')->with('success', 'Review berhasil dihapus.');
    }
}
