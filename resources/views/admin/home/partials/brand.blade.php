<div class="header-flex">
    <h3>Brand Partner</h3>
    <a href="{{ route('admin.home.brand.create') }}" class="btn btn-primary">+ Tambah Brand</a>
</div>

<table>
    <thead>
        <tr>
            <th>Logo</th>
            <th>Nama Brand</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($brands as $item)
            <tr>
                <td>
                    @if ($item->logo)
                        <img src="{{ asset('storage/' . $item->logo) }}" width="80">
                    @else
                        <em>Tidak ada logo</em>
                    @endif
                </td>
                <td>{{ $item->name }}</td>
                <td class="action-buttons">
                    <a href="{{ route('admin.home.brand.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.home.brand.destroy', $item->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Hapus brand ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3"><em>Belum ada data Brand Partner.</em></td>
            </tr>
        @endforelse
    </tbody>
</table>
