@extends('layouts.admin')

@section('content')
    <h2>Tambah Founder</h2>

    <form action="{{ route('admin.home.founder.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Nama Founder:</label><br>
            <input type="text" name="name" required>
        </div>

        <div style="margin-top:10px;">
            <label>Deskripsi:</label><br>
            <textarea name="description" rows="4"></textarea>
        </div>

        <div style="margin-top:10px;">
            <label>Gambar:</label><br>
            <input type="file" name="image">
        </div>

        <button type="submit" class="btn btn-success" style="margin-top:15px;">Simpan</button>
        <a href="{{ route('admin.home.founder.index') }}" class="btn btn-warning">Batal</a>
    </form>
@endsection
