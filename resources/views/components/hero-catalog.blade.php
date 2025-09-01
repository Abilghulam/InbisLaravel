@php
    $catalogMap = [
        'hp' => [
            'url' => '/catalog-hp',
            'label' => 'Catalog HP',
            'posters' => [
                'img/poster/hp1.jpg',
                'img/poster/hp2.jpg',
                'img/poster/hp3.jpg',
                'img/poster/hp4.jpg',
                'img/poster/hp5.jpg',
                'img/poster/hp6.jpg',
                'img/poster/hp7.jpg',
            ],
        ],
        'pc' => [
            'url' => '/catalog-pc',
            'label' => 'Catalog PC',
            'posters' => ['img/poster/pc1.jpg', 'img/poster/pc2.jpg', 'img/poster/pc3.jpg'],
        ],
        'laptop' => [
            'url' => '/catalog-laptop',
            'label' => 'Catalog Laptop',
            'posters' => [
                'img/poster/laptop1.jpg',
                'img/poster/laptop2.jpg',
                'img/poster/laptop3.jpg',
                'img/poster/laptop4.jpg',
                'img/poster/laptop5.jpg',
                'img/poster/laptop6.jpg',
                'img/poster/laptop7.jpg',
                'img/poster/laptop8.png',
                'img/poster/laptop9.jpg',
            ],
        ],
        'accessories' => [
            'url' => '/catalog-accessories',
            'label' => 'Catalog Accessories',
            'posters' => ['img/poster/acc1.jpg', 'img/poster/acc2.jpg', 'img/poster/acc3.jpg'],
        ],
    ];

    // Fallback (Console Log)
    $catalog = $catalogMap[$type ?? ''] ?? [
        'url' => '/catalog',
        'label' => 'Catalog',
        'posters' => ['img/poster/poster1.jpg', 'img/poster/poster2.jpg', 'img/poster/poster3.jpg'],
    ];
@endphp

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-slider">
        @foreach ($catalog['posters'] as $index => $poster)
            <div class="slide">
                <img src="{{ asset($poster) }}" alt="Promotion {{ $index + 1 }}" loading="lazy">
            </div>
        @endforeach
    </div>

    <!-- Navigation -->
    <button class="prev">&#10094;</button>
    <button class="next">&#10095;</button>

    <!-- Dots -->
    <div class="dots"></div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb-card-section">
    <a href="/">Home</a>
    <span class="separator">›</span>
    <a href="{{ $catalog['url'] }}">{{ $catalog['label'] }}</a>
    <span class="separator">›</span>
    <span class="current">Semua Produk</span>
</nav>
