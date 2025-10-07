@extends('layouts.admin')

@section('content')
    <div class="form-container">
        <h2>Tambah Catalog Hero</h2>

        <form action="{{ route('admin.catalog.hero.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Kategori</label>
                <select name="category" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="hp">HP</option>
                    <option value="laptop">Laptop</option>
                    <option value="pc">PC</option>
                    <option value="accessories">Accessories</option>
                </select>
            </div>

            <div class="form-group">
                <label>Gambar Carousel</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
            </div>

            <div class="form-group">
                <label>Caption (opsional)</label>
                <input type="text" name="caption" class="form-control" value="{{ old('caption') }}">
            </div>

            <button type="submit" class="btn btn-success" style="margin-top:15px;">Simpan</button>
            <a href="{{ route('admin.catalog.hero.index') }}" class="btn btn-warning">Batal</a>
        </form>
    </div>
@endsection
