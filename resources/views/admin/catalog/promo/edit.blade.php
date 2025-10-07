@extends('layouts.admin')

@section('content')
    <div class="form-container">
        <h2>Edit Judul Promo Global</h2>

        <form action="{{ route('admin.catalog.promo.update', $promo_title->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Judul Promo</label>
                <input type="text" name="title" id="title" class="form-control" required
                    value="{{ old('title', $promo_title->title) }}">
                @error('title')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="subtitle">Subjudul (Opsional)</label>
                <input type="text" name="subtitle" id="subtitle" class="form-control"
                    value="{{ old('subtitle', $promo_title->subtitle) }}">
                @error('subtitle')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-success" style="margin-top:15px;">Update</button>
            <a href="{{ route('admin.catalog.hero.index') }}" class="btn btn-warning">Batal</a>
        </form>
    </div>
@endsection
