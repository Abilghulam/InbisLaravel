@extends('layouts.admin')

@section('content')
    <h2>Kelola Catalog</h2>

    <!-- Section Header -->
    <div class="section-header">
        <div class="section-title">
            <h3>Brand Category Section</h3>
            <p>Kelola logo brand untuk filter produk berdasarkan kategori katalog.</p>
        </div>
        <a href="{{ route('admin.catalog.brand.create') }}" class="btn btn-primary">+ Tambah Brand</a>
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
                <th>Logo</th>
                <th>Nama Brand</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($brands as $brand)
                <tr>
                    <td><img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}" width="100"></td>
                    <td>{{ $brand->name }}</td>
                    <td>{{ strtoupper($brand->category) }}</td>
                    <td>
                        <a href="{{ route('admin.catalog.brand.edit', $brand->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.catalog.brand.destroy', $brand->id) }}" method="POST"
                            style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Hapus brand ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center"><em>Belum ada brand.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination-wrapper">
        {{ $brand->links('vendor.pagination.admin') }}
    </div>
@endsection
