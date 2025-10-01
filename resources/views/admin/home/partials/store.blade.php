<div class="header-flex">
    <h3>Retail Store</h3>
    <a href="{{ route('admin.home.store.create') }}" class="btn btn-primary">+ Tambah Store</a>
</div>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Alamat</th>
            <th>Gambar</th>
            <th>Media Sosial</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($stores as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ Str::limit($item->description, 50) }}</td>
                <td>{{ $item->address }}</td>
                <td>
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" width="80">
                    @else
                        <em>Tidak ada gambar</em>
                    @endif
                </td>
                <td>{{ $item->social_media }}</td>
                <td>{!! $item->iframe !!}</td>
                <td class="action-buttons">
                    <a href="{{ route('admin.home.store.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.home.store.destroy', $item->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Hapus store ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7"><em>Belum ada data Store.</em></td>
            </tr>
        @endforelse
    </tbody>
</table>
