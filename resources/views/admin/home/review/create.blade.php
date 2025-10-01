@extends('layouts.admin')

@section('content')
    <h2>Tambah Review</h2>

    <form action="{{ route('admin.home.review.store') }}" method="POST">
        @csrf
        <div>
            <label>Nama:</label><br>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Bintang (1-5):</label><br>
            <input type="number" name="stars" min="1" max="5" required>
        </div>

        <div>
            <label>Tanggal Review:</label><br>
            <input type="date" name="review_date" required>
        </div>

        <div>
            <label>Deskripsi:</label><br>
            <textarea name="description" required></textarea>
        </div>

        <button type="submit" class="btn btn-success" style="margin-top:15px;">Simpan</button>
        <a href="{{ route('admin.home.review.index') }}" class="btn btn-warning">Batal</a>
    </form>
@endsection
