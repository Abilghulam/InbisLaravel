@props([
    'type' => 'all',
    'brands' => collect(),
])

<!-- Brands Section -->
<section class="brands-section">
    <div class="container">
        <h2 class="brand-title">Brand Pilihan</h2>

        @if ($brands->count() > 0)
            <div class="brand-grid">
                @foreach ($brands as $brand)
                    <a href="{{ route('catalog.show', $type) }}?brand={{ strtolower($brand->slug ?? Str::slug($brand->name)) }}"
                        class="brand-card" data-brand="{{ strtolower($brand->slug ?? Str::slug($brand->name)) }}">
                        <img src="{{ $brand->image ? asset($brand->image) : asset('img/no-image.png') }}"
                            alt="{{ $brand->name }}" loading="lazy">
                    </a>
                @endforeach
            </div>
        @else
            <div class="no-brand-message fade-in" style="text-align:center; margin:40px 0; color:#888;">
                <p>Belum ada data brand untuk kategori ini.</p>
            </div>
        @endif
    </div>
</section>
