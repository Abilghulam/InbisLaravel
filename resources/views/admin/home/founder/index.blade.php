@extends('layouts.admin')

@section('content')
    <div class="header-flex">
        <h2>Kelola Founder</h2>
        <a href="{{ route('admin.home.founder.create') }}" class="btn btn-primary">+ Tambah Founder</a>
    </div>

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
            @forelse($founders as $founder)
                <tr>
                    <td>{{ $founder->name }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($founder->description, 80) }}</td>
                    <td>
                        @if ($founder->image)
                            <img src="{{ asset('storage/' . $founder->image) }}" width="80">
                        @else
                            <em>Tidak ada gambar</em>
                        @endif
                    </td>
                    <td class="action-buttons">
                        <a href="{{ route('admin.home.founder.edit', $founder->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.home.founder.destroy', $founder->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus founder ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"><em>Belum ada founder.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
