@extends('layouts.admin')

@section('content')
    <h2>Kelola Product Catalog</h2>

    <!-- Tabs -->
    <div class="tabs">
        <button class="tab-link {{ request('category') == 'hp' || !request('category') ? 'active' : '' }}" data-tab="tab-hp"
            onclick="window.location='{{ route('admin.product.index', ['category' => 'hp']) }}'">
            Handphone
        </button>

        <button class="tab-link {{ request('category') == 'laptop' ? 'active' : '' }}" data-tab="tab-laptop"
            onclick="window.location='{{ route('admin.product.index', ['category' => 'laptop']) }}'">
            Laptop & Notebook
        </button>

        <button class="tab-link {{ request('category') == 'pc' ? 'active' : '' }}" data-tab="tab-pc"
            onclick="window.location='{{ route('admin.product.index', ['category' => 'pc']) }}'">
            Dekstop Computer
        </button>

        <button class="tab-link {{ request('category') == 'accessories' ? 'active' : '' }}" data-tab="tab-accessories"
            onclick="window.location='{{ route('admin.product.index', ['category' => 'accessories']) }}'">
            Accessories
        </button>
    </div>

    <!-- HP -->
    <div id="tab-hp" class="tab-content {{ request('category') == 'hp' || !request('category') ? 'active' : '' }}">
        @include('admin.product.partials.table', ['products' => $hp, 'title' => 'Catalog Handphone'])
    </div>

    <!-- Laptop -->
    <div id="tab-laptop" class="tab-content {{ request('category') == 'laptop' ? 'active' : '' }}">
        @include('admin.product.partials.table', [
            'products' => $laptop,
            'title' => 'Catalog Laptop & Notebook',
        ])
    </div>

    <!-- PC -->
    <div id="tab-pc" class="tab-content {{ request('category') == 'pc' ? 'active' : '' }}">
        @include('admin.product.partials.table', [
            'products' => $pc,
            'title' => 'Catalog Dekstop Computer',
        ])
    </div>

    <!-- Accessories -->
    <div id="tab-accessories" class="tab-content {{ request('category') == 'accessories' ? 'active' : '' }}">
        @include('admin.product.partials.table', [
            'products' => $accessories,
            'title' => 'Catalog Accessories',
        ])
    </div>
@endsection
