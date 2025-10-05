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
            'name'        => 'required|string|max:255',
            'stars'       => 'required|integer|min:1|max:5',
            'review_date' => 'required|date',
            'description' => 'required|string',
        ]);

        CustomerReview::create($request->only(['name', 'stars', 'review_date', 'description']));

        return redirect()->route('admin.home.review.index')->with('success', 'Review berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $customer_reviews = CustomerReview::findOrFail($id);
        return view('admin.home.review.edit', compact('customer_reviews'));
    }

    public function update(Request $request, $id)
    {
        $customer_reviews = CustomerReview::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'stars'       => 'required|integer|min:1|max:5',
            'review_date' => 'required|date',
            'description' => 'required|string',
        ]);

        $customer_reviews->update($request->only(['name', 'stars', 'review_date', 'description']));

        return redirect()->route('admin.home.review.index')->with('success', 'Review berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $customer_reviews = CustomerReview::findOrFail($id);
        $customer_reviews->delete();

        return redirect()->route('admin.home.review.index')->with('success', 'Review berhasil dihapus.');
    }
}
