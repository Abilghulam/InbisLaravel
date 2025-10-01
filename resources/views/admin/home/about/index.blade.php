@extends('layouts.admin')

@section('content')
    <h2>Kelola About Us</h2>

    @if ($about)
        <p><strong>Deskripsi:</strong> {{ $about->description }}</p>
        <p><strong>Rating:</strong> {{ $about->rating }}</p>
        <p><strong>Tahun Pengalaman:</strong> {{ $about->years_experience }}</p>
        <p><strong>Brand Partners:</strong> {{ $about->brand_partners }}</p>
        <p><strong>Retail Stores:</strong> {{ $about->retail_stores }}</p>

        <a href="{{ route('about-us.edit', $about->id) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('about-us.destroy', $about->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    @else
        <a href="{{ route('about-us.create') }}" class="btn btn-primary">+ Tambah About Us</a>
    @endif
@endsection
