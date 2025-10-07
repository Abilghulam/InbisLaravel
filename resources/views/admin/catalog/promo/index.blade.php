@extends('layouts.admin')

@section('content')
    <h2>Kelola Catalog</h2>

    <!-- Section Header -->
    <div class="section-header">
        <div class="section-title">
            <h3>Promo Title Section</h3>
            <p>Atur judul promo global yang akan tampil di semua kategori katalog (HP, Laptop, PC, Accessories).</p>
        </div>
        @if (!$promo_title)
            <a href="{{ route('admin.catalog.promo.create') }}" class="btn btn-primary">+ Tambah Judul Promo</a>
        @endif
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
                <th>Judul</th>
                <th>Subjudul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($promo_title)
                <tr>
                    <td>{{ $promo_title->title }}</td>
                    <td>{{ $promo_title->subtitle ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.catalog.promo.edit', $promo_title->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.catalog.promo.destroy', $promo_title->id) }}" method="POST"
                            style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Hapus judul promo ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @else
                <tr>
                    <td colspan="3" class="text-center"><em>Belum ada judul promo.</em></td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
