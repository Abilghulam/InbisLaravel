<div class="header-flex">
    <h3>Customer Reviews</h3>
    <a href="{{ route('admin.home.review.create') }}" class="btn btn-primary">+ Tambah Review</a>
</div>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Bintang</th>
            <th>Tanggal</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($reviews as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->stars }} ★</td>
                <td>{{ $item->date }}</td>
                <td>{{ Str::limit($item->description, 50) }}</td>
                <td class="action-buttons">
                    <a href="{{ route('admin.home.review.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.home.review.destroy', $item->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Hapus review ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5"><em>Belum ada data Review.</em></td>
            </tr>
        @endforelse
    </tbody>
</table>
