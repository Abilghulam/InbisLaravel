@extends('layouts.admin')

@section('content')
    <h2>Edit Founder</h2>

    <form action="{{ route('admin.home.founder.update', $founders->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div>
            <label>Nama Founder:</label><br>
            <input type="text" name="name" value="{{ old('name', $founders->name) }}" required>
        </div>

        <div style="margin-top:10px;">
            <label>Deskripsi:</label><br>
            <textarea name="description" rows="4">{{ old('description', $founders->description) }}</textarea>
        </div>

        <div style="margin-top:10px;">
            <label>Gambar:</label><br>
            @if ($founders->image)
                <img src="{{ asset('uploads/' . $founders->image) }}" width="100" style="margin-bottom:10px;">
            @endif
            <input type="file" name="image">
        </div>

        <button type="submit" class="btn btn-success" style="margin-top:15px;">Update</button>
        <a href="{{ route('admin.home.founder.index') }}" class="btn btn-warning">Batal</a>
    </form>
@endsection
