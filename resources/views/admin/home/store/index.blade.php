@extends('layouts.admin')

@section('content')
    <h2>Kelola Home</h2>

    <!-- Section Header -->
    <div class="section-header">
        <div class="section-title">
            <h3>Retail Store Resource Section</h3>
            <p>Kelola data daftar retail store melalui nama, gambar, alamat, media sosial, dan map embed</p>
        </div>
        <a href="{{ route('admin.home.store.create') }}" class="btn btn-primary">+ Tambah Store</a>
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
                <th>Alamat</th>
                <th>Gambar</th>
                <th>Facebook</th>
                <th>Instagram</th>
                <th>Maps</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($retail_stores as $store)
                <tr>
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->address }}</td>
                    <td>
                        @if ($store->image)
                            <img src="{{ asset('storage/' . $store->image) }}" width="80">
                        @else
                            <em>Tidak ada gambar</em>
                        @endif
                    </td>
                    <td>
                        @if ($store->facebook)
                            <a href="{{ $store->facebook }}" target="_blank">Facebook</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($store->instagram)
                            <a href="{{ $store->instagram }}" target="_blank">Instagram</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($store->map_iframe)
                            <a href="{{ $store->map_iframe }}" target="_blank">Lihat Map</a>
                        @else
                            -
                        @endif
                    </td>
                    <td class="action-buttons">
                        <a href="{{ route('admin.home.store.edit', $store->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.home.store.destroy', $store->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus store ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7"><em>Belum ada data retail store.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
