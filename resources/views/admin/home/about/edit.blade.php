@extends('layouts.admin')

@section('content')
    <div class="form-container">
        <h2>Edit About Us</h2>

        <form action="{{ route('about-us.update', $about->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" rows="4" class="form-control" required>{{ old('description', $about->description) }}</textarea>
                @error('description')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="rating">Rating (0 - 5)</label>
                <input type="number" name="rating" id="rating" step="0.1" min="0" max="5"
                    value="{{ old('rating', $about->rating) }}" class="form-control" required>
                @error('rating')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="years_experience">Tahun Pengalaman</label>
                <input type="number" name="years_experience" id="years_experience" min="0"
                    value="{{ old('years_experience', $about->years_experience) }}" class="form-control" required>
                @error('years_experience')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="brand_partners">Jumlah Brand Partner</label>
                <input type="number" name="brand_partners" id="brand_partners" min="0"
                    value="{{ old('brand_partners', $about->brand_partners) }}" class="form-control" required>
                @error('brand_partners')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="retail_stores">Jumlah Retail Store</label>
                <input type="number" name="retail_stores" id="retail_stores" min="0"
                    value="{{ old('retail_stores', $about->retail_stores) }}" class="form-control" required>
                @error('retail_stores')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('about-us.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
