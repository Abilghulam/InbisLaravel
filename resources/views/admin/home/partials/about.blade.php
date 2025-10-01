<div class="header-flex">
    <h3>About Us</h3>
    <a href="{{ route('admin.home.about.create') }}" class="btn btn-primary">+ Tambah Data</a>
</div>

<table>
    <thead>
        <tr>
            <th>Deskripsi</th>
            <th>Rating</th>
            <th>Tahun Pengalaman</th>
            <th>Brand Partner</th>
            <th>Retail Store</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if ($about)
            <tr>
                <td>{{ Str::limit($about->description, 50) }}</td>
                <td>{{ $about->rating }} ★</td>
                <td>{{ $about->experience_years }} Tahun</td>
                <td>{{ $about->brand_partners }}</td>
                <td>{{ $about->retail_stores }}</td>
                <td class="action-buttons">
                    <a href="{{ route('admin.home.about.edit', $about->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.home.about.destroy', $about->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @else
            <tr>
                <td colspan="6"><em>Belum ada data About Us.</em></td>
            </tr>
        @endif
    </tbody>
</table>
