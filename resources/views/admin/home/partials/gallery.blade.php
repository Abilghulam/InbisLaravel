<div class="header-flex">
    <h3>Gallery</h3>
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
        @forelse($gallery as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" width="80">
                    @else
                        <em>Tidak ada gambar</em>
                    @endif
                </td>
                <td class="action-buttons">
                    <a href="{{ route('admin.home.gallery.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.home.gallery.destroy', $item->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Hapus gambar ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3"><em>Belum ada data Gallery.</em></td>
            </tr>
        @endforelse
    </tbody>
</table>
