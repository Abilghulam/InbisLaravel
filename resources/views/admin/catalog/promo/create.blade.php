@extends('layouts.admin')

@section('content')
    <div class="form-container">
        <h2>Tambah Judul Promo Global</h2>

        <form action="{{ route('admin.catalog.promo.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Judul Promo</label>
                <input type="text" name="title" id="title" class="form-control" required value="{{ old('title') }}"
                    placeholder="Contoh: Promo Spesial Bulan Oktober">
                @error('title')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="subtitle">Subjudul (Opsional)</label>
                <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle') }}"
                    placeholder="Contoh: Diskon hingga 30% untuk semua produk">
                @error('subtitle')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-success" style="margin-top:15px;">Simpan</button>
            <a href="{{ route('admin.catalog.promo.index') }}" class="btn btn-warning">Batal</a>
        </form>
    </div>
@endsection
