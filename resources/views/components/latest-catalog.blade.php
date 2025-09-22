<section class="latest-section">
    <div class="container">
        <h2 class="latest-title">Produk Terbaru Menarik</h2>
        <div class="latest-wrapper">
            <button class="scroll-btn left">‹</button>

            <div class="latest-scroll">
                @foreach ($latest as $item)
                    <div class="latest-card" data-name="{{ $item->name }}" data-brand="{{ $item->brand }}"
                        data-category="{{ $item->category }}" data-level="{{ $item->level }}"
                        data-image="{{ asset($item->image) }}" data-price="{{ $item->price }}"
                        data-price-label="Rp {{ number_format($item->price, 0, ',', '.') }}" data-old-price=""
                        data-stock="{{ $item->stock }}" data-specs="{!! $item->specs !!}">


                        <!-- Brand -->
                        <div class="brand-logo">
                            <img src="{{ asset('img/brand/' . strtolower($item->brand) . '.png') }}"
                                alt="{{ $item->brand }}">
                        </div>

                        <!-- Gambar Produk -->
                        <img class="latest-image" src="{{ asset($item->image) }}" alt="{{ $item->name }}"
                            loading="lazy">

                        <!-- Nama Produk -->
                        <h3>{{ $item->name }}</h3>

                        <!-- Harga -->
                        <p class="price">Rp {{ number_format($item->price, 0, ',', '.') }}</p>

                        <!-- Hidden Specs (untuk modal saja, tidak tampil di card) -->
                        <span class="hidden product-specs">{{ $item->specs }}</span>

                        <button class="btn-detail">View Details</button>
                    </div>
                @endforeach
            </div>

            <button class="scroll-btn right">›</button>
        </div>
    </div>
</section>
