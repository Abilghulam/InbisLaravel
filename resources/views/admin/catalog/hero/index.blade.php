@extends('layouts.admin')

@section('content')
    <h2>Kelola Catalog</h2>

    <!-- Section Header -->
    <div class="section-header">
        <div class="section-title">
            <h3>Hero Section</h3>
            <p>Kelola gambar carousel untuk kategori catalog (HP, Laptop, PC, Accessories).</p>
        </div>
        <a href="{{ route('admin.catalog.hero.create') }}" class="btn btn-primary">+ Tambah Hero</a>
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

    <table class="table">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Kategori</th>
                <th>Caption</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($heroes as $hero)
                <tr>
                    <td><img src="{{ asset($hero->image) }}" alt="Hero" width="120"></td>
                    <td>{{ strtoupper($hero->category) }}</td>
                    <td>{{ $hero->caption ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.catalog.hero.edit', $hero->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.catalog.hero.destroy', $hero->id) }}" method="POST"
                            style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center"><em>Belum ada data hero.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination-wrapper">
        {{ $heroes->links('vendor.pagination.admin') }}
    </div>
@endsection
