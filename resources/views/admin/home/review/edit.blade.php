@extends('layouts.admin')

@section('content')
    <h2>Edit Review</h2>

    <form action="{{ route('admin.home.review.update', $review->id) }}" method="POST">
        @csrf @method('PUT')

        <div>
            <label>Nama:</label><br>
            <input type="text" name="name" value="{{ old('name', $review->name) }}" required>
        </div>

        <div>
            <label>Bintang (1-5):</label><br>
            <input type="number" name="stars" min="1" max="5" value="{{ old('stars', $review->stars) }}"
                required>
        </div>

        <div>
            <label>Tanggal Review:</label><br>
            <input type="date" name="review_date" value="{{ old('review_date', $review->review_date->format('Y-m-d')) }}"
                required>
        </div>

        <div>
            <label>Deskripsi:</label><br>
            <textarea name="description" required>{{ old('description', $review->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success" style="margin-top:15px;">Update</button>
        <a href="{{ route('admin.home.review.index') }}" class="btn btn-warning">Batal</a>
    </form>
@endsection
