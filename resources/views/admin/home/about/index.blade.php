@extends('layouts.admin')

@section('content')
    <h2>Kelola Home</h2>

    <!-- Section Header -->
    <div class="section-header">
        <div class="section-title">
            <h3>About Us Section</h3>
            <p>Kelola data deskripsi, rating, tahun pengalaman, jumlah brand partner, & jumlah retail store</p>
        </div>
        <a href="{{ route('admin.home.about.create') }}" class="btn btn-primary">+ Tambah About Us</a>
    </div>

    <style>
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin: 25px 0 20px 0;
            gap: 15px;
        }

        .section-header .section-title {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .section-header .section-title h3 {
            margin: 0 0 10px 0;
            font-size: 20px;
            font-weight: 600;
            color: #222;
        }

        .section-header .section-title p {
            margin: 0;
            font-size: 0.95rem;
            color: #555;
        }

        .section-header .btn {
            align-self: center;
            padding: 8px 16px;
            border-radius: 20px;
            background: #457b9d;
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.2s;
        }

        .section-header .btn:hover {
            background: #35627b;
        }
    </style>
    <!-- Section Header End -->


    <table class="table">
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
            @if ($about_us)
                <tr>
                    <td>{{ Str::limit($about_us->description, 50) }}</td>
                    <td>{{ $about_us->rating }}</td>
                    <td>{{ $about_us->years_experience }} Tahun</td>
                    <td>{{ $about_us->brand_partners }}</td>
                    <td>{{ $about_us->retail_stores }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('admin.home.about.edit', $about_us->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.home.about.destroy', $about_us->id) }}" method="POST"
                            style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @else
                <tr>
                    <td colspan="6" class="text-center">
                        <em>Belum ada data About Us.</em>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
