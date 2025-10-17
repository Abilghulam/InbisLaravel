@extends('layouts.admin')

@section('content')
    <h2>Kelola Home</h2>

    <!-- Section Header -->
    <div class="section-header">
        <div class="section-title">
            <h3>Gallery Section</h3>
            <p>Kelola data dengan tambah, edit, atau hapus gambar dan title pada display galeri</p>
        </div>
        <a href="{{ route('admin.home.gallery.create') }}" class="btn btn-primary">+ Tambah Gambar</a>
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
                <th>Judul</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($galleries as $gallery)
                <tr>
                    <td>{{ $gallery->title }}</td>
                    <td>
                        <img src="{{ asset($gallery->image) }}" width="100">
                    </td>
                    <td class="action-buttons">
                        <a href="{{ route('admin.home.gallery.edit', $gallery->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.home.gallery.destroy', $gallery->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus gambar ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"><em>Belum ada data galeri.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination-wrapper">
        {{ $galleries->links('vendor.pagination.admin') }}
    </div>
@endsection
