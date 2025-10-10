@extends('layouts.admin')

@section('content')
    <h2>Kelola Home</h2>

    <!-- Section Header -->
    <div class="section-header">
        <div class="section-title">
            <h3>Brand Partner Section</h3>
            <p>Kelola logo brand partner untuk display website</p>
        </div>
        <a href="{{ route('admin.home.brand.create') }}" class="btn btn-primary">+ Tambah Brand Partner</a>
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
                <th>Nama Brand</th>
                <th>Logo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($brand_partners as $brand)
                <tr>
                    <td>{{ $brand->name }}</td>
                    <td><img src="{{ asset('uploads/' . $brand->logo) }}" width="100"></td>
                    <td class="action-buttons">
                        <a href="{{ route('admin.home.brand.edit', $brand->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.home.brand.destroy', $brand->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus brand ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"><em>Belum ada data brand partner.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
