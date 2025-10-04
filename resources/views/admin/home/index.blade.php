@extends('layouts.admin')

@section('content')
    <h2>Kelola Halaman Home</h2>
    <p>Pilih bagian yang ingin kamu kelola dari halaman utama website.</p>

    <div class="dashboard-cards" style="display: grid; grid-template-columns: repeat(2, 1fr);">
        <!-- About Us -->
        <div class="card">
            <h3>Kelola About Us</h3>
            <p>Edit deskripsi, rating, pengalaman, jumlah brand partner & retail store.</p>
            <a href="{{ route('admin.home.about.index') }}" class="btn btn-danger">Masuk</a>
        </div>

        <!-- Founder -->
        <div class="card">
            <h3>Kelola Founder</h3>
            <p>Edit data founder (nama, deskripsi, dan gambar).</p>
            <a href="{{ route('admin.home.founder.index') }}" class="btn btn-danger">Masuk</a>
        </div>

        <!-- Gallery -->
        <div class="card">
            <h3>Kelola Gallery</h3>
            <p>Tambah, ubah, atau hapus gambar gallery.</p>
            <a href="{{ route('admin.home.gallery.index') }}" class="btn btn-danger">Masuk</a>
        </div>

        <!-- Brand Partner -->
        <div class="card">
            <h3>Kelola Brand Partner</h3>
            <p>Kelola logo partner brand yang tampil di website.</p>
            <a href="{{ route('admin.home.brand.index') }}" class="btn btn-danger">Masuk</a>
        </div>

        <!-- Retail Store -->
        <div class="card">
            <h3>Kelola Retail Store</h3>
            <p>Edit daftar retail store (alamat, deskripsi, maps, dll).</p>
            <a href="{{ route('admin.home.store.index') }}" class="btn btn-danger">Masuk</a>
        </div>

        <!-- Customer Reviews -->
        <div class="card">
            <h3>Kelola Customer Reviews</h3>
            <p>Tambah dan kelola ulasan pelanggan.</p>
            <a href="{{ route('admin.home.review.index') }}" class="btn btn-danger">Masuk</a>
        </div>
    </div>
@endsection
