<div class="header-flex">
    <h3>Founder</h3>
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
        @if ($founder)
            <tr>
                <td>{{ $founder->name }}</td>
                <td>{{ Str::limit($founder->description, 50) }}</td>
                <td>
                    @if ($founder->image)
                        <img src="{{ asset('storage/' . $founder->image) }}" width="80" alt="Foto Founder">
                    @else
                        <em>Tidak ada gambar</em>
                    @endif
                </td>
                <td class="action-buttons">
                    <a href="{{ route('admin.home.founder.edit', $founder->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.home.founder.destroy', $founder->id) }}" method="POST"
                        style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Yakin hapus founder ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @else
            <tr>
                <td colspan="4"><em>Belum ada data Founder.</em></td>
            </tr>
        @endif
    </tbody>
</table>
