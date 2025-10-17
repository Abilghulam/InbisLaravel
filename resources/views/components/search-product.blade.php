@props(['product'])

<div class="product-card 
    {{ $product->section === 'promo' ? 'promo-card' : '' }}
    {{ $product->section === 'latest' ? 'latest-card' : '' }}
    {{ $product->section === 'recommendation' ? 'recommendation-card' : '' }}"
    data-name="{{ $product->name }}" data-brand="{{ $product->brand }}" data-category="{{ $product->category }}"
    data-level="{{ $product->level }}" data-image="{{ asset($product->image) }}" data-price="{{ $product->price }}"
    data-price-label="Rp {{ number_format($product->price, 0, ',', '.') }}" data-old-price="{{ $product->old_price }}"
    data-stock="{{ $product->stock }}">

    <!-- Product Image -->
    <div class="image-wrapper">
        <img class="product-image" src="{{ asset($product->image) }}" alt="{{ $product->name }}" loading="lazy">

        {{-- BADGES --}}
        @if ($product->section === 'latest')
            <span class="badge badge-new">New</span>
        @elseif ($product->section === 'recommendation')
            <span class="badge badge-best">Best Product</span>
        @endif
    </div>

    <!-- Brand Logo -->
    <div class="brand-logo">
        <img src="{{ asset('img/brand/' . strtolower($product->brand) . '.png') }}" alt="{{ $product->brand }}">
    </div>

    <!-- Product Info -->
    <h3>{{ $product->name }}</h3>

    @if ($product->section === 'promo')
        @if (!empty($product->old_price))
            <p class="old-price">Rp {{ number_format($product->old_price, 0, ',', '.') }}</p>
        @endif
        <p class="price highlight">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
    @else
        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
    @endif

    <!-- Hidden Specs -->
    <span class="hidden product-specs">{{ $product->specs }}</span>

    <!-- Button -->
    <button class="btn-detail">View Details</button>
</div>
