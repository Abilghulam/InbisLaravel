@extends('layouts.admin')

@section('content')
    <h2>Edit Retail Store</h2>

    <form action="{{ route('admin.home.store.update', $retail_stores->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $retail_stores->name }}" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="address" class="form-control" required>{{ $retail_stores->address }}</textarea>
        </div>

        <div class="form-group">
            <label>Facebook</label>
            <input type="url" name="facebook" class="form-control" value="{{ $retail_stores->facebook }}">
        </div>

        <div class="form-group">
            <label>Instagram</label>
            <input type="url" name="instagram" class="form-control" value="{{ $retail_stores->instagram }}">
        </div>

        <div class="form-group">
            <label>Embed Map (iframe)</label>
            <textarea name="map_iframe" class="form-control">{{ $retail_stores->map_iframe }}</textarea>
        </div>

        <div class="form-group">
            <label>Gambar</label><br>
            @if ($retail_stores->image)
                <img src="{{ asset('storage/' . $retail_stores->image) }}" width="100"><br><br>
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.home.store.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
