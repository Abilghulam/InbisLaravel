@extends('layouts.admin')

@section('content')
    <h2>Kelola Home</h2>

    <!-- Section Header -->
    <div class="section-header">
        <div class="section-title">
            <h3>Founder Section</h3>
            <p>Kelola data nama, deskripsi, dan gambar founder pada display website</p>
        </div>
        <a href="{{ route('admin.home.founder.create') }}" class="btn btn-primary">+ Tambah Founder</a>
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
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($founders)
                <tr>
                    <td>{{ $founders->name }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($founders->description, 80) }}</td>
                    <td>
                        @if ($founders->image)
                            <img src="{{ asset('storage/' . $founders->image) }}" width="80">
                        @else
                            <em>Tidak ada gambar</em>
                        @endif
                    </td>
                    <td class="action-buttons">
                        <a href="{{ route('admin.home.founder.edit', $founders->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.home.founder.destroy', $founders->id) }}" method="POST"
                            style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus founder ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @else
                <tr>
                    <td colspan="4" class="text-center">
                        <em>Belum ada data founder.</em>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
