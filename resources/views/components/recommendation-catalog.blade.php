<!-- Recommendation Section -->
<section class="recommendation-section">
    <div class="container">
        <h2 class="recommendation-title">
            Rekomendasi terbaik buatmu
        </h2>

        <div class="recommendation-wrapper">
            <button class="scroll-btn left">‹</button>

            <div class="recommendation-scroll">
                @foreach ($recommendations as $item)
                    <div class="recommendation-card" data-name="{{ $item->name }}" data-brand="{{ $item->brand }}"
                        data-category="{{ $item->category }}" data-level="{{ $item->level }}"
                        data-image="{{ asset('storage/' . $item->image) }}" data-price="{{ $item->price }}"
                        data-price-label="Rp {{ number_format($item->price, 0, ',', '.') }}"
                        data-old-price="{{ $item->old_price }}" data-stock="{{ $item->stock }}"
                        data-specs="{!! $item->specs !!}">

                        <!-- Brand Logo -->
                        <div class="brand-logo">
                            <img src="{{ asset('img/brand/' . strtolower($item->brand) . '.png') }}"
                                alt="{{ $item->brand }}">
                        </div>

                        <!-- Product Image -->
                        <img class="recommendation-image" src="{{ asset('storage/' . $item->image) }}"
                            alt="{{ $item->name }}" loading="lazy">

                        <!-- Product Info -->
                        <h3>{{ $item->name }}</h3>
                        <p class="price">Rp {{ number_format($item->price, 0, ',', '.') }}</p>

                        <!-- Hidden Specs -->
                        <span class="hidden product-specs">{{ $item->specs }}</span>

                        <!-- Button -->
                        <button class="btn-detail">View Details</button>
                    </div>
                @endforeach
            </div>

            <button class="scroll-btn right">›</button>
        </div>
    </div>
</section>
