@extends('layouts.admin')

@section('content')
    <h2>Tambah Brand Partner</h2>

    <form action="{{ route('admin.home.brand.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Nama Brand:</label><br>
            <input type="text" name="name" required>
        </div>

        <div style="margin-top:10px;">
            <label>Upload Logo:</label><br>
            <input type="file" name="logo" required>
        </div>

        <button type="submit" class="btn btn-success" style="margin-top:15px;">Simpan</button>
        <a href="{{ route('admin.home.brand.index') }}" class="btn btn-warning">Batal</a>
    </form>
@endsection
