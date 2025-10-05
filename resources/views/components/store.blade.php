@props(['retail_stores' => null])

<!-- Retail Store Section -->
<section class="store-section" id="section-store">
    <div class="container">
        <h2 class="section-title fade-in" style="margin-top: 40px">
            Our Retail Store
        </h2>

        @if ($retail_stores->isNotEmpty())
            <div class="gallery-grid">
                @foreach ($retail_stores as $store)
                    <div class="store-card fade-in">
                        <img src="{{ asset('storage/' . $store->image) }}" alt="{{ $store->name }}" loading="lazy" />
                        <div class="overlay">
                            <h3>{{ $store->name }}</h3>
                            <button class="btn-see" data-store="{{ $store->name }}"
                                data-address="{{ $store->address }}" data-instagram="{{ $store->instagram }}"
                                data-facebook="{{ $store->facebook }}" data-map="{{ $store->map_iframe }}">
                                View More
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-data fade-in" style="text-align: center; padding: 50px 0; color: #666;">
                <p>Belum ada data retail store yang tersedia.</p>
            </div>
        @endif
    </div>
</section>
