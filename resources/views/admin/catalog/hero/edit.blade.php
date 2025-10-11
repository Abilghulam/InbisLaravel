@extends('layouts.admin')

@section('content')
    <div class="form-container">
        <h2>Edit Catalog Hero</h2>

        <form action="{{ route('admin.catalog.hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="form-group">
                <label>Kategori</label>
                <select name="category" class="form-control" required>
                    <option value="hp" {{ $hero->category == 'hp' ? 'selected' : '' }}>HP</option>
                    <option value="laptop" {{ $hero->category == 'laptop' ? 'selected' : '' }}>Laptop</option>
                    <option value="pc" {{ $hero->category == 'pc' ? 'selected' : '' }}>PC</option>
                    <option value="accessories" {{ $hero->category == 'accessories' ? 'selected' : '' }}>Accessories
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label>Gambar Caraousel</label><br>
                <img src="{{ asset($hero->image) }}" alt="Hero" width="150"><br><br>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div class="form-group">
                <label>Caption</label>
                <input type="text" name="caption" class="form-control" value="{{ old('caption', $hero->caption) }}">
            </div>

            <button type="submit" class="btn btn-success" style="margin-top:15px;">Update</button>
            <a href="{{ route('admin.catalog.hero.index') }}" class="btn btn-warning">Batal</a>
        </form>
    </div>
@endsection
