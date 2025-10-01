@extends('layouts.admin')

@section('content')
    <h2>Tambah Gambar Gallery</h2>

    <form action="{{ route('admin.home.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Judul Gambar:</label><br>
            <input type="text" name="title" required>
        </div>

        <div style="margin-top:10px;">
            <label>Upload Gambar:</label><br>
            <input type="file" name="image" required>
        </div>

        <button type="submit" class="btn btn-success" style="margin-top:15px;">Simpan</button>
        <a href="{{ route('admin.home.gallery.index') }}" class="btn btn-warning">Batal</a>
    </form>
@endsection
