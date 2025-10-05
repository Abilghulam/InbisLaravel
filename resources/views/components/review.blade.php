@props(['customer_reviews' => null])

<!-- Review Customer Section -->
<section class="reviews-section" id="reviews">
    <h2 class="section-title fade-in">Customer Reviews</h2>

    @if ($customer_reviews->isNotEmpty())
        <div class="swiper mySwiper fade-in">
            <div class="swiper-wrapper">
                @php
                    // Daftar warna background untuk avatar
                    $colors = [
                        'dc2626',
                        'f97316',
                        'ca8a04',
                        '16a34a',
                        '0d9488',
                        '2563eb',
                        '7c3aed',
                        'be185d',
                        'db2777',
                        '6d28d9',
                        '4b5563',
                        'b91c1c',
                    ];
                @endphp

                @foreach ($customer_reviews as $index => $review)
                    @php
                        // Pilih warna dari array berdasarkan urutan index
                        $color = $colors[$index % count($colors)];
                    @endphp

                    <div class="swiper-slide review-card">
                        <div class="review-header">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($review->name) }}&background={{ $color }}&color=fff&size=60"
                                alt="{{ $review->name }}" />
                            <div class="review-info">
                                <h4>{{ $review->name }}</h4>
                                <div class="review-meta">
                                    <div class="stars">
                                        {{-- tampilkan bintang sesuai jumlah --}}
                                        @for ($i = 0; $i < $review->stars; $i++)
                                            ★
                                        @endfor
                                        @for ($i = $review->stars; $i < 5; $i++)
                                            ☆
                                        @endfor
                                    </div>
                                    <div class="date">
                                        {{ \Carbon\Carbon::parse($review->review_date)->format('d-m-Y') }}</div>
                                </div>
                            </div>
                        </div>
                        <p>"{{ $review->description }}"</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="google-summary fade-in">Ulasan Google</div>
    @else
        <div class="no-data fade-in" style="text-align: center; padding: 50px 0; color: #666;">
            <p>Belum ada ulasan pelanggan yang tersedia.</p>
        </div>
    @endif
</section>
