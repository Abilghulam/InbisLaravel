@props(['promo_title' => null])

<section class="promo-section">
    <div class="container">
        {{-- Judul Promo (Global) --}}
        <h2 class="promo-title">
            {{ $promo_title->title ?? 'Promo Spesial Bulan Ini' }}
        </h2>

        {{-- Subjudul (Opsional) --}}
        @if (!empty($promo_title->subtitle))
            <p class="promo-subtitle"
                style="
            color: rgba(245, 245, 245, 0.85);
            font-size: 1.05rem;
            font-style: italic;
            font-weight: 400;
            margin-top: 8px;
            margin-bottom: 30px;
            letter-spacing: 0.3px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        ">
                {{ $promo_title->subtitle }}
            </p>
        @endif

        {{-- Daftar Produk Promo --}}
        @if (isset($promos) && $promos->count() > 0)
            <div class="promo-wrapper">
                <button class="scroll-btn left">‹</button>

                <div class="promo-scroll">
                    @foreach ($promos as $promo)
                        @php
                            // Normalisasi nilai agar aman
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
                            data-category="{{ e($promo->category) }}" data-level="{{ e($promo->level ?? '') }}"
                            data-image="{{ $promo->image ? asset($promo->image) : asset('img/no-image.png') }}"
                            data-price="{{ $finalPrice }}" data-price-label="{{ $finalPriceLabel }}"
                            data-old-price="{{ $oldPrice ?? '' }}" data-stock="{{ e($promo->stock ?? '-') }}"
                            data-specs="{!! $promo->specs ?? '' !!}">

                            {{-- Badge Diskon --}}
                            @if ($discount > 0)
                                <div class="discount-badge">{{ $discount }}%</div>
                            @endif

                            {{-- Logo Brand --}}
                            <div class="brand-logo">
                                <img src="{{ asset('img/brand/' . strtolower($promo->brand) . '.png') }}"
                                    alt="{{ $promo->brand }}" loading="lazy">
                            </div>

                            {{-- Gambar Produk --}}
                            <img class="promo-image"
                                src="{{ $promo->image ? asset($promo->image) : asset('img/no-image.png') }}"
                                alt="{{ $promo->name }}" loading="lazy">

                            {{-- Nama Produk --}}
                            <h3>{{ $promo->name }}</h3>

                            {{-- Harga Lama --}}
                            @if ($oldPrice)
                                <p class="old-price">{{ $oldPriceLabel }}</p>
                            @endif

                            {{-- Harga Baru --}}
                            <p class="new-price">{{ $finalPriceLabel ?: '-' }}</p>

                            <span class="hidden product-specs">{{ $promo->specs }}</span>
                            <button class="btn-detail">View Details</button>
                        </div>
                    @endforeach
                </div>

                <button class="scroll-btn right">›</button>
            </div>
        @else
            {{-- Pesan jika belum ada promo --}}
            <div class="no-promo-message fade-in" style="text-align:center; margin:40px 0; color:#666;">
                <p>Belum ada promo yang tersedia untuk saat ini.</p>
            </div>
        @endif
    </div>
</section>
