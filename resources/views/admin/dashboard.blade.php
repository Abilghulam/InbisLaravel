@extends('layouts.admin') @section('content')
    <h2>Hai {{ Auth::user()->name }}, Selamat Datang di Dashboard Admin</h2>
    <p>Pilih menu navigasi di atas untuk mulai mengelola konten website.</p>
    <div class="dashboard-cards">
        <div class="card">
            <h3>Kelola Home</h3>
            <p>Edit banner & promo di halaman utama.</p> <a href="{{ route('home.index') }}">Masuk</a>
        </div>
        <div class="card">
            <h3>Kelola Catalog</h3>
            <p>Tambah, ubah, atau hapus produk katalog.</p> <a href="{{ route('catalog.index') }}">Masuk</a>
        </div>
    </div>
@endsection
