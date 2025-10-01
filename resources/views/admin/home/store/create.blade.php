@extends('layouts.admin')

@section('content')
    <h2>Tambah Retail Store</h2>

    <form action="{{ route('admin.home.store.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Nama Store:</label><br>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Deskripsi:</label><br>
            <textarea name="description"></textarea>
        </div>

        <div>
            <label>Alamat:</label><br>
            <input type="text" name="address">
        </div>

        <div>
            <label>Upload Gambar:</label><br>
            <input type="file" name="image">
        </div>

        <div>
            <label>Facebook:</label><br>
            <input type="url" name="facebook">
        </div>

        <div>
            <label>Instagram:</label><br>
            <input type="url" name="instagram">
        </div>

        <div>
            <label>WhatsApp (format: 628xxx):</label><br>
            <input type="text" name="whatsapp">
        </div>

        <div>
            <label>Google Maps Embed (iframe):</label><br>
            <textarea name="map_iframe"></textarea>
        </div>

        <button type="submit" class="btn btn-success" style="margin-top:15px;">Simpan</button>
        <a href="{{ route('admin.home.store.index') }}" class="btn btn-warning">Batal</a>
    </form>
@endsection
