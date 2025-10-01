@extends('layouts.admin')

@section('content')
    <h2>Edit Gambar Gallery</h2>

    <form action="{{ route('admin.home.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div>
            <label>Judul Gambar:</label><br>
            <input type="text" name="title" value="{{ old('title', $gallery->title) }}" required>
        </div>

        <div style="margin-top:10px;">
            <label>Gambar:</label><br>
            <img src="{{ asset('storage/' . $gallery->image) }}" width="120" style="margin-bottom:10px;"><br>
            <input type="file" name="image">
        </div>

        <button type="submit" class="btn btn-success" style="margin-top:15px;">Update</button>
        <a href="{{ route('admin.home.gallery.index') }}" class="btn btn-warning">Batal</a>
    </form>
@endsection
