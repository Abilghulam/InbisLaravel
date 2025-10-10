@extends('layouts.admin')

@section('content')
    <h2>Edit Brand Partner</h2>

    <form action="{{ route('admin.home.brand.update', $brand_partners->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div>
            <label>Nama Brand:</label><br>
            <input type="text" name="name" value="{{ old('name', $brand_partners->name) }}" required>
        </div>

        <div style="margin-top:10px;">
            <label>Logo:</label><br>
            <img src="{{ asset('uploads/' . $brand_partners->logo) }}" width="120" style="margin-bottom:10px;"><br>
            <input type="file" name="logo">
        </div>

        <button type="submit" class="btn btn-success" style="margin-top:15px;">Update</button>
        <a href="{{ route('admin.home.brand.index') }}" class="btn btn-warning">Batal</a>
    </form>
@endsection
