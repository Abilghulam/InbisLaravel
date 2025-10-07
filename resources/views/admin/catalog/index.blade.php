@extends('layouts.admin')

@section('content')
    <h2>Kelola Halaman Catalog</h2>
    <p>Pilih bagian catalog yang ingin kamu kelola di bawah ini.</p>

    <div class="dashboard-cards">
        <div class="card">
            <h3>Hero Section</h3>
            <p>Edit banner gambar carousel pada halaman catalog.</p>
            <a href="{{ route('admin.catalog.hero.index') }}">Masuk</a>
        </div>

        <div class="card">
            <h3>Promo Title Section</h3>
            <p>Ubah judul dan deskripsi promo section pada halaman catalog.</p>
            <a href="{{ route('admin.catalog.promo.index') }}">Masuk</a>
        </div>

        <div class="card">
            <h3>Brand Category Section</h3>
            <p>Tambah atau ubah logo brand yang digunakan sebagai filter catalog.</p>
            <a href="{{ route('admin.catalog.brand.index') }}">Masuk</a>
        </div>
    </div>
@endsection
