@extends('layouts.admin')

@section('content')
    <h2>Tambah Retail Store</h2>

    <form action="{{ route('admin.home.store.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label>Facebook</label>
            <input type="url" name="facebook" class="form-control">
        </div>

        <div class="form-group">
            <label>Instagram</label>
            <input type="url" name="instagram" class="form-control">
        </div>

        <div class="form-group">
            <label>Embed Map (iframe)</label>
            <textarea name="map_iframe" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success" style="margin-top:15px;">Simpan</button>
        <a href="{{ route('admin.home.store.index') }}" class="btn btn-warning">Batal</a>
    </form>
@endsection
