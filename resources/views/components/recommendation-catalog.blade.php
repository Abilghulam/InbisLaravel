@php
    $recommendationMap = [
        'hp' => [
            [
                'brand' => 'img/brand/apple.png',
                'img' => 'img/category/iphone15pm.png',
                'name' => 'iPhone 15',
                'price' => 'Rp 15.000.000',
            ],
            [
                'brand' => 'img/brand/samsung.png',
                'img' => 'img/category/samsung25.png',
                'name' => 'Samsung Galaxy S24',
                'price' => 'Rp 13.500.000',
            ],
            [
                'brand' => 'img/brand/oppo.png',
                'img' => 'img/category/oppo.png',
                'name' => 'Oppo Reno 14 Pro',
                'price' => 'Rp 25.000.000',
            ],
        ],
        'pc' => [
            [
                'brand' => 'img/brand/asus.png',
                'img' => 'img/category/pc-rog.png',
                'name' => 'PC Gaming ROG',
                'price' => 'Rp 15.000.000',
            ],
            [
                'brand' => 'img/brand/lenovo.png',
                'img' => 'img/category/pc-lenovo.png',
                'name' => 'PC Lenovo ThinkCentre',
                'price' => 'Rp 7.500.000',
            ],
            [
                'brand' => 'img/brand/msi.png',
                'img' => 'img/category/pc-msi.png',
                'name' => 'PC Editing MSI',
                'price' => 'Rp 12.000.000',
            ],
        ],
        'laptop' => [
            [
                'brand' => 'img/brand/asus.png',
                'img' => 'img/category/asus.png',
                'name' => 'ASUS Vivobook',
                'price' => 'Rp 8.300.000',
            ],
            [
                'brand' => 'img/brand/apple.png',
                'img' => 'img/category/lenovo.png',
                'name' => 'MacBook Air M2',
                'price' => 'Rp 18.500.000',
            ],
            [
                'brand' => 'img/brand/acer.png',
                'img' => 'img/category/hp.png',
                'name' => 'Acer Nitro 5',
                'price' => 'Rp 13.000.000',
            ],
            [
                'brand' => 'img/brand/acer.png',
                'img' => 'img/category/msi.png',
                'name' => 'Acer Nitro 5',
                'price' => 'Rp 13.000.000',
            ],
        ],
        'accessories' => [
            [
                'brand' => 'img/brand/logitech.png',
                'img' => 'img/category/mouse.png',
                'name' => 'Mouse Wireless Logitech',
                'price' => 'Rp 750.000',
            ],
            [
                'brand' => 'img/brand/razer.png',
                'img' => 'img/category/headset.png',
                'name' => 'Razer Headset Gaming',
                'price' => 'Rp 1.200.000',
            ],
            [
                'brand' => 'img/brand/keychron.png',
                'img' => 'img/category/keyboard.png',
                'name' => 'Keyboard Keychron',
                'price' => 'Rp 2.000.000',
            ],
        ],
    ];

    $recommendations = $recommendationMap[$type ?? ''] ?? [];
@endphp

<!-- Recommendation Section -->
<section class="recommendation-section">
    <div class="container">
        <h2 class="recommendation-title">
            Rekomendasi terbaik buatmu
            <a href="#" class="see-all-btn">Lihat Semua <span>›</span></a>
        </h2>

        <div class="recommendation-wrapper">
            <button class="scroll-btn left">‹</button>

            <div class="recommendation-scroll">
                @foreach ($recommendations as $item)
                    <div class="recommendation-card">
                        <div class="brand-logo">
                            <img src="{{ asset($item['brand']) }}" alt="{{ $item['name'] }}">
                        </div>
                        <img class="recommendation-image" src="{{ asset($item['img']) }}" alt="{{ $item['name'] }}"
                            loading="lazy">
                        <h3>{{ $item['name'] }}</h3>
                        <p class="price">{{ $item['price'] }}</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>
                @endforeach
            </div>

            <button class="scroll-btn right">›</button>
        </div>
    </div>
</section>
