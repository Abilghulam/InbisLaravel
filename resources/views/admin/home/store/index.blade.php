@extends('layouts.admin')

@section('content')
    <div class="header-flex">
        <h2>Kelola Retail Store</h2>
        <a href="{{ route('admin.home.store.create') }}" class="btn btn-primary">+ Tambah Store</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Store</th>
                <th>Alamat</th>
                <th>Gambar</th>
                <th>Sosial Media</th>
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
                            <img src="{{ asset('storage/' . $store->image) }}" width="100">
                        @else
                            <em>Tidak ada</em>
                        @endif
                    </td>
                    <td>
                        @if ($store->facebook)
                            <a href="{{ $store->facebook }}" target="_blank">FB</a>
                        @endif
                        @if ($store->instagram)
                            | <a href="{{ $store->instagram }}" target="_blank">IG</a>
                        @endif
                        @if ($store->whatsapp)
                            | <a href="https://wa.me/{{ $store->whatsapp }}" target="_blank">WA</a>
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
                    <td colspan="5"><em>Belum ada retail store.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
