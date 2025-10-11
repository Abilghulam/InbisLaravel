@props(['heroes' => null])

<!-- Hero Section Dinamis -->
<section class="hero-section">
    @if (isset($heroes) && $heroes instanceof \Illuminate\Support\Collection && $heroes->count())
        <div class="hero-slider">
            @foreach ($heroes as $index => $hero)
                <div class="slide">
                    <img src="{{ asset($hero->image) }}" alt="Hero {{ $index + 1 }}" loading="lazy">
                </div>
            @endforeach
        </div>
    @else
        <div class="hero-slider">
            <div class="slide">
                <img src="{{ asset('img/poster/default.jpg') }}" alt="Default Hero" loading="lazy">
                <div class="hero-caption">Tidak ada promo untuk kategori ini</div>
            </div>
        </div>
    @endif

    <!-- Navigasi -->
    <button class="prev">&#10094;</button>
    <button class="next">&#10095;</button>

    <!-- Dots -->
    <div class="dots"></div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb-card-section">
    <a href="/">Home</a>
    <span class="separator">›</span>
    <a href="/catalog/{{ $type }}">Catalog {{ ucfirst($type) }}</a>
    <span class="separator">›</span>
    <span class="current">Semua Produk</span>
</nav>
