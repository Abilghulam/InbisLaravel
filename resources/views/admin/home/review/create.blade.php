@extends('layouts.admin')

@section('content')
    <h2>Tambah Review</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.home.review.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label>Bintang (1-5):</label>
            <input type="number" name="stars" min="1" max="5" class="form-control"
                value="{{ old('stars') }}" required>
        </div>

        <div class="form-group">
            <label>Tanggal Review:</label>
            <input type="date" name="review_date" class="form-control" value="{{ old('review_date') }}" required>
        </div>

        <div class="form-group">
            <label>Deskripsi:</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.home.review.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
