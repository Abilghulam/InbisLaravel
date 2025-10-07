@extends('layouts.admin')

@section('content')
    <div class="form-container">
        <h2>Edit Brand Catalog</h2>

        <form action="{{ route('admin.catalog.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="category">Kategori</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="hp" {{ $brand->category == 'hp' ? 'selected' : '' }}>HP</option>
                    <option value="laptop" {{ $brand->category == 'laptop' ? 'selected' : '' }}>Laptop</option>
                    <option value="pc" {{ $brand->category == 'pc' ? 'selected' : '' }}>PC</option>
                    <option value="accessories" {{ $brand->category == 'accessories' ? 'selected' : '' }}>Accessories
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="name">Nama Brand</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $brand->name) }}" required>
                @error('name')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Logo Sekarang</label><br>
                <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" width="150" class="mb-2">
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah logo.</small>
            </div>

            <button type="submit" class="btn btn-success" style="margin-top:15px;">Update</button>
            <a href="{{ route('admin.catalog.brand.index') }}" class="btn btn-warning">Batal</a>
        </form>
    </div>
@endsection
