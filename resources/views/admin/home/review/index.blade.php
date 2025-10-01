@extends('layouts.admin')

@section('content')
    <div class="header-flex">
        <h2>Kelola Customer Reviews</h2>
        <a href="{{ route('admin.home.review.create') }}" class="btn btn-primary">+ Tambah Review</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Bintang</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($customer_reviews as $review)
                <tr>
                    <td>{{ $review->name }}</td>
                    <td>
                        @for ($i = 1; $i <= 5; $i++)
                            <span style="color:{{ $i <= $review->stars ? 'gold' : '#ccc' }}">★</span>
                        @endfor
                    </td>
                    <td>{{ $review->review_date->format('d M Y') }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($review->description, 80) }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('admin.home.review.edit', $review->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.home.review.destroy', $review->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus review ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5"><em>Belum ada review.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
