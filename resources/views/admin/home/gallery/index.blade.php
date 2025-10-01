@extends('layouts.admin')

@section('content')
    <div class="header-flex">
        <h2>Kelola Gallery</h2>
        <a href="{{ route('admin.home.gallery.create') }}" class="btn btn-primary">+ Tambah Gambar</a>
    </div>

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
                        <img src="{{ asset('storage/' . $gallery->image) }}" width="100">
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
                    <td colspan="3"><em>Belum ada gambar.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
