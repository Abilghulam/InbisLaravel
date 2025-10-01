@extends('layouts.admin')

@section('content')
    <h2>Edit Retail Store</h2>

    <form action="{{ route('admin.home.store.update', $store->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div>
            <label>Nama Store:</label><br>
            <input type="text" name="name" value="{{ old('name', $store->name) }}" required>
        </div>

        <div>
            <label>Deskripsi:</label><br>
            <textarea name="description">{{ old('description', $store->description) }}</textarea>
        </div>

        <div>
            <label>Alamat:</label><br>
            <input type="text" name="address" value="{{ old('address', $store->address) }}">
        </div>

        <div>
            <label>Gambar:</label><br>
            @if ($store->image)
                <img src="{{ asset('storage/' . $store->image) }}" width="120" style="margin-bottom:10px;"><br>
            @endif
            <input type="file" name="image">
        </div>

        <div>
            <label>Facebook:</label><br>
            <input type="url" name="facebook" value="{{ old('facebook', $store->facebook) }}">
        </div>

        <div>
            <label>Instagram:</label><br>
            <input type="url" name="instagram" value="{{ old('instagram', $store->instagram) }}">
        </div>

        <div>
            <label>WhatsApp:</label><br>
            <input type="text" name="whatsapp" value="{{ old('whatsapp', $store->whatsapp) }}">
        </div>

        <div>
            <label>Google Maps Embed (iframe):</label><br>
            <textarea name="map_iframe">{{ old('map_iframe', $store->map_iframe) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success" style="margin-top:15px;">Update</button>
        <a href="{{ route('admin.home.store.index') }}" class="btn btn-warning">Batal</a>
    </form>
@endsection
