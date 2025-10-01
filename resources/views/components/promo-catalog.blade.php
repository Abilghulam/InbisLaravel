<section class="promo-section">
    <div class="container">
        <h2 class="promo-title">Promo Spesial Hari Kemerdekaan</h2>
        <div class="promo-wrapper">
            <button class="scroll-btn left">‹</button>

            <div class="promo-scroll">
                @foreach ($promos as $promo)
                    @php
                        $priceRaw = $promo->price ?? ($promo['price'] ?? 0);
                        $oldPriceRaw = $promo->old_price ?? ($promo['old_price'] ?? null);
                        $discountRaw = $promo->discount ?? ($promo['discount'] ?? 0);

                        $price = floatval($priceRaw ?: 0);
                        $oldPrice = $oldPriceRaw !== null ? floatval($oldPriceRaw) : null;
                        $discount = intval($discountRaw ?: 0);

                        if ($price > 0) {
                            $finalPrice = $price;
                        } elseif ($oldPrice !== null && $discount > 0) {
                            $finalPrice = round($oldPrice - ($oldPrice * $discount) / 100);
                        } elseif ($oldPrice !== null) {
                            $finalPrice = $oldPrice;
                        } else {
                            $finalPrice = 0;
                        }

                        $finalPriceLabel = $finalPrice ? 'Rp ' . number_format($finalPrice, 0, ',', '.') : '';
                        $oldPriceLabel = $oldPrice ? 'Rp ' . number_format($oldPrice, 0, ',', '.') : '';
                    @endphp

                    <div class="promo-card" data-name="{{ e($promo->name) }}" data-brand="{{ e($promo->brand) }}"
                        data-category="{{ $promo->category }}" data-level="{{ $promo->level }}"
                        data-image="{{ $promo->image ? asset('storage/' . $promo->image) : '' }}"
                        data-price="{{ $finalPrice }}" data-price-label="{{ $finalPriceLabel }}"
                        data-old-price="{{ $oldPrice ?? '' }}" data-stock="{{ e($promo->stock) }}"
                        data-specs="{!! $promo->specs ?? ($promo['specs'] ?? '') !!}">

                        @if ($discount > 0)
                            <div class="discount-badge">-{{ $discount }}%</div>
                        @endif

                        <div class="brand-logo">
                            <img src="{{ asset('img/brand/' . strtolower($promo->brand) . '.png') }}"
                                alt="{{ $promo->brand }}">
                        </div>

                        <img class="promo-image" src="{{ $promo->image ? asset('storage/' . $promo->image) : '' }}"
                            alt="{{ $promo->name }}" loading="lazy">

                        <h3>{{ $promo->name }}</h3>

                        @if ($oldPrice)
                            <p class="old-price">{{ $oldPriceLabel }}</p>
                        @endif
                        <p class="new-price">{{ $finalPriceLabel ?: '-' }}</p>

                        <span class="hidden product-specs">{{ $promo->specs }}</span>
                        <button class="btn-detail">View Details</button>
                    </div>
                @endforeach
            </div>

            <button class="scroll-btn right">›</button>
        </div>
    </div>
</section>
