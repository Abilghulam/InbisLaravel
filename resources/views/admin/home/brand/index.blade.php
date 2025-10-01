@extends('layouts.admin')

@section('content')
    <div class="header-flex">
        <h2>Kelola Brand Partner</h2>
        <a href="{{ route('admin.home.brand.create') }}" class="btn btn-primary">+ Tambah Brand</a>
    </div>

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
                    <td><img src="{{ asset('storage/' . $brand->logo) }}" width="100"></td>
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
                    <td colspan="3"><em>Belum ada brand partner.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
