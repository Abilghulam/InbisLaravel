@extends('layouts.admin')

@section('content')
    <h2>Kelola Catalog</h2>

    <!-- Tabs -->
    <div class="tabs">
        <button class="tab-link active" data-tab="tab-hp">Handphone</button>
        <button class="tab-link" data-tab="tab-laptop">Laptop & Notebook</button>
        <button class="tab-link" data-tab="tab-pc">Dekstop Computer</button>
        <button class="tab-link" data-tab="tab-accessories">Accessories</button>
    </div>

    <!-- HP -->
    <div id="tab-hp" class="tab-content active">
        @include('admin.catalog.partials.table', ['products' => $hp, 'title' => 'Catalog Handphone'])
    </div>

    <!-- Laptop -->
    <div id="tab-laptop" class="tab-content">
        @include('admin.catalog.partials.table', [
            'products' => $laptop,
            'title' => 'Catalog Laptop & Notebook',
        ])
    </div>

    <!-- PC -->
    <div id="tab-pc" class="tab-content">
        @include('admin.catalog.partials.table', [
            'products' => $pc,
            'title' => 'Catalog Dekstop Computer',
        ])
    </div>

    <!-- Accessories -->
    <div id="tab-accessories" class="tab-content">
        @include('admin.catalog.partials.table', [
            'products' => $accessories,
            'title' => 'Catalog Accessories',
        ])
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
