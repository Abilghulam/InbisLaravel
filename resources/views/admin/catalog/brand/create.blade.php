@extends('layouts.admin')

@section('content')
    <div class="form-container">
        <h2>Tambah Brand Catalog</h2>

        <form action="{{ route('admin.catalog.brand.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="category">Kategori</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="hp">HP</option>
                    <option value="laptop">Laptop</option>
                    <option value="pc">PC</option>
                    <option value="accessories">Accessories</option>
                </select>
            </div>

            <div class="form-group">
                <label for="name">Nama Brand</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                    required>
                @error('name')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Logo Brand</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                @error('image')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-success" style="margin-top:15px;">Simpan</button>
            <a href="{{ route('admin.catalog.brand.index') }}" class="btn btn-warning">Batal</a>
        </form>
    </div>
@endsection
