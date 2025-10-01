@extends('layouts.admin')

@section('content')
    <h2>Kelola Halaman Home</h2>

    <!-- Tabs -->
    <div class="tabs">
        <button class="tab-link active" data-tab="tab-about">About Us</button>
        <button class="tab-link" data-tab="tab-founder">Founder</button>
        <button class="tab-link" data-tab="tab-gallery">Gallery</button>
        <button class="tab-link" data-tab="tab-brand">Brand Partner</button>
        <button class="tab-link" data-tab="tab-store">Retail Store</button>
        <button class="tab-link" data-tab="tab-review">Customer Reviews</button>
    </div>

    <!-- About Us -->
    <div id="tab-about" class="tab-content active">
        @include('admin.home.partials.about', ['about' => $about])
        <div class="actions">
            <a href="{{ route('admin.home.about.index') }}" class="btn btn-primary">Kelola About Us</a>
        </div>
    </div>

    <!-- Founder -->
    <div id="tab-founder" class="tab-content">
        @include('admin.home.partials.founder', ['founder' => $founder])
        <div class="actions">
            <a href="{{ route('admin.home.founder.index') }}" class="btn btn-primary">Kelola Founder</a>
        </div>
    </div>

    <!-- Gallery -->
    <div id="tab-gallery" class="tab-content">
        @include('admin.home.partials.gallery', ['gallery' => $gallery])
        <div class="actions">
            <a href="{{ route('admin.home.gallery.index') }}" class="btn btn-primary">Kelola Gallery</a>
        </div>
    </div>

    <!-- Brand Partner -->
    <div id="tab-brand" class="tab-content">
        @include('admin.home.partials.brand', ['brands' => $brands])
        <div class="actions">
            <a href="{{ route('admin.home.brand.index') }}" class="btn btn-primary">Kelola Brand Partner</a>
        </div>
    </div>

    <!-- Retail Store -->
    <div id="tab-store" class="tab-content">
        @include('admin.home.partials.store', ['stores' => $stores])
        <div class="actions">
            <a href="{{ route('admin.home.store.index') }}" class="btn btn-primary">Kelola Retail Store</a>
        </div>
    </div>

    <!-- Customer Reviews -->
    <div id="tab-review" class="tab-content">
        @include('admin.home.partials.review', ['reviews' => $reviews])
        <div class="actions">
            <a href="{{ route('admin.home.review.index') }}" class="btn btn-primary">Kelola Customer Reviews</a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.tab-link').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.tab-link').forEach(el => el.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
                btn.classList.add('active');
                document.getElementById(btn.dataset.tab).classList.add('active');
            });
        });
    </script>
@endpush
