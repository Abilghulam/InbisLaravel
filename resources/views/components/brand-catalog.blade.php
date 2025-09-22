@php
    $brandMap = [
        'hp' => [
            ['name' => 'Apple', 'slug' => 'apple', 'img' => 'img/brand/apple.png'],
            ['name' => 'Samsung', 'slug' => 'samsung', 'img' => 'img/brand/samsung.png'],
            ['name' => 'Vivo', 'slug' => 'vivo', 'img' => 'img/brand/vivo.png'],
            ['name' => 'Oppo', 'slug' => 'oppo', 'img' => 'img/brand/oppo.png'],
            ['name' => 'Xiaomi', 'slug' => 'xiaomi', 'img' => 'img/brand/xiaomi1.png'],
            ['name' => 'Poco', 'slug' => 'poco', 'img' => 'img/brand/poco.png'],
            ['name' => 'Realme', 'slug' => 'realme', 'img' => 'img/brand/realme.png'],
            ['name' => 'Infinix', 'slug' => 'infinix', 'img' => 'img/brand/infinix.png'],
            ['name' => 'Oneplus', 'slug' => 'oneplus', 'img' => 'img/brand/oneplus.png'],
            ['name' => 'Pixel', 'slug' => 'pixel', 'img' => 'img/brand/pixel.png'],
            ['name' => 'Tecno', 'slug' => 'tecno', 'img' => 'img/brand/tecno.png'],
            ['name' => 'Huawei', 'slug' => 'huawei', 'img' => 'img/brand/huawei.png'],
        ],
        'laptop' => [
            ['name' => 'Apple', 'slug' => 'apple', 'img' => 'img/brand/apple.png'],
            ['name' => 'Lenovo', 'slug' => 'lenovo', 'img' => 'img/brand/lenovo.png'],
            ['name' => 'Asus', 'slug' => 'asus', 'img' => 'img/brand/asus.png'],
            ['name' => 'Acer', 'slug' => 'acer', 'img' => 'img/brand/acer.png'],
            ['name' => 'MSI', 'slug' => 'msi', 'img' => 'img/brand/msi.png'],
            ['name' => 'HP', 'slug' => 'hp', 'img' => 'img/brand/hp.png'],
            ['name' => 'Dell', 'slug' => 'dell', 'img' => 'img/brand/dell.png'],
            ['name' => 'Axioo', 'slug' => 'axioo', 'img' => 'img/brand/axioo.png'],
            ['name' => 'Microsoft', 'slug' => 'microsoft', 'img' => 'img/brand/microsoft.png'],
            ['name' => 'Huawei', 'slug' => 'huawei', 'img' => 'img/brand/huawei.png'],
            ['name' => 'Rog', 'slug' => 'rog', 'img' => 'img/brand/rog.png'],
        ],
        'pc' => [
            ['name' => 'ROG', 'slug' => 'rog', 'img' => 'img/brand/rog.png'],
            ['name' => 'MSI', 'slug' => 'msi', 'img' => 'img/brand/msi.png'],
            ['name' => 'Lenovo', 'slug' => 'lenovo', 'img' => 'img/brand/lenovo.png'],
            ['name' => 'Aorus', 'slug' => 'aorus', 'img' => 'img/brand/aorus.png'],
            ['name' => 'Gigabyte', 'slug' => 'gigabyte', 'img' => 'img/brand/gigabyte.png'],
            ['name' => 'Asrock', 'slug' => 'asrock', 'img' => 'img/brand/asrock.png'],
            ['name' => 'Biostar', 'slug' => 'biostar', 'img' => 'img/brand/biostar.png'],
            ['name' => 'Dell', 'slug' => 'dell', 'img' => 'img/brand/dell.png'],
        ],
        'accessories' => [
            ['name' => 'Logitech', 'slug' => 'logitech', 'img' => 'img/brand/logitech.png'],
            ['name' => 'Razer', 'slug' => 'razer', 'img' => 'img/brand/razer.png'],
            ['name' => 'Keychron', 'slug' => 'keychron', 'img' => 'img/brand/keychron.png'],
            ['name' => 'Steelseries', 'slug' => 'steelseries', 'img' => 'img/brand/steelseries.png'],
            ['name' => 'Rexus', 'slug' => 'rexus', 'img' => 'img/brand/rexus.png'],
            ['name' => 'Fantech', 'slug' => 'fantech', 'img' => 'img/brand/fantech.png'],
            ['name' => 'Armaggeddon', 'slug' => 'armaggeddon', 'img' => 'img/brand/armaggeddon.png'],
        ],
    ];

    $brands = $brandMap[$type ?? ''] ?? [];
@endphp

<!-- Brands Section -->
<section class="brands-section">
    <div class="container">
        <h2 class="brand-title">Kategori Brand</h2>
        <div class="brand-grid">
            @foreach ($brands as $brand)
                <a href="{{ url()->current() }}?brand={{ $brand['slug'] }}" class="brand-card"
                    data-brand="{{ $brand['slug'] }}">
                    <img src="{{ asset($brand['img']) }}" alt="{{ $brand['name'] }}" loading="lazy">
                </a>
            @endforeach
        </div>
    </div>
</section>
