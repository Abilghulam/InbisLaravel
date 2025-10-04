@extends('layouts.admin')

@section('content')
    <h2>Kelola Home</h2>

    <!-- Section Header -->
    <div class="section-header">
        <div class="section-title">
            <h3>Customer Review Section</h3>
            <p>Kelola data review customer dengan menambah, mengubah, atau menghapus ulasan pelanggan</p>
        </div>
        <a href="{{ route('admin.home.review.create') }}" class="btn btn-primary">+ Tambah Ulasan</a>
    </div>

    <style>
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin: 25px 0 20px 0;
            gap: 15px;
        }

        .section-header .section-title {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .section-header .section-title h3 {
            margin: 0 0 10px 0;
            font-size: 20px;
            font-weight: 600;
            color: #222;
        }

        .section-header .section-title p {
            margin: 0;
            font-size: 0.95rem;
            color: #555;
        }

        .section-header .btn {
            align-self: center;
            padding: 8px 16px;
            border-radius: 20px;
            background: #457b9d;
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.2s;
        }

        .section-header .btn:hover {
            background: #35627b;
        }
    </style>
    <!-- Section Header End -->

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
                    <td>{{ $review->stars }} / 5</td>
                    <td>{{ $review->review_date }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($review->description, 80) }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('admin.home.review.edit', $review->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.home.review.destroy', $review->id) }}" method="POST"
                            style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus review ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5"><em>Belum ada data customer review.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
