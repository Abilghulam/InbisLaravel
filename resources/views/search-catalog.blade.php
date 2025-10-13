<x-layout-search :type="$type" :results="$results" :keyword="$keyword">
    <section class="products-section" style="margin-top: 60px;">
        <div class="container">
            <div class="catalog-layout">

                <!-- Sidebar (Filter) -->
                <aside class="sidebar">
                    <form id="filterForm" method="GET" action="{{ route('catalog.search', $type) }}">
                        {{-- simpan keyword supaya tidak hilang saat filter --}}
                        <input type="hidden" name="q" value="{{ request('q') }}">
                        <div class="filter-header">
                            <h3>Filter Produk</h3>
                            <button type="button" id="clearFiltersBtn" class="clear-btn">
                                <i data-lucide="refresh-ccw"></i>
                                Clear Filter</button>
                        </div>

                        <!-- Sorting -->
                        <div class="filter-group">
                            <div class="filter-header" onclick="toggleFilter(this)">
                                <h4>Urutkan</h4>
                                <i data-lucide="chevron-up" class="arrow"></i>
                            </div>
                            <div class="filter-content">
                                <label>
                                    <input type="radio" name="sort" value="default"
                                        {{ request('sort', 'default') === 'default' ? 'checked' : '' }}>
                                    Paling Sesuai
                                </label><br>

                                <label>
                                    <input type="radio" name="sort" value="price-asc"
                                        {{ request('sort') === 'price-asc' ? 'checked' : '' }}>
                                    Harga Termurah
                                </label><br>

                                <label>
                                    <input type="radio" name="sort" value="price-desc"
                                        {{ request('sort') === 'price-desc' ? 'checked' : '' }}>
                                    Harga Termahal
                                </label><br>

                                <label>
                                    <input type="radio" name="sort" value="newest"
                                        {{ request('sort') === 'newest' ? 'checked' : '' }}>
                                    Terbaru
                                </label>
                            </div>
                        </div>

                        <!-- Level -->
                        <div class="filter-group">
                            <div class="filter-header" onclick="toggleFilter(this)">
                                <h4>Kategori</h4>
                                <i data-lucide="chevron-up" class="arrow"></i>
                            </div>
                            <div class="filter-content">
                                <label><input type="checkbox" name="level[]" value="flagship"
                                        {{ in_array('flagship', request('level', [])) ? 'checked' : '' }}>
                                    Flagship</label><br>
                                <label><input type="checkbox" name="level[]" value="high range"
                                        {{ in_array('high range', request('level', [])) ? 'checked' : '' }}> High
                                    Range</label><br>
                                <label><input type="checkbox" name="level[]" value="mid range"
                                        {{ in_array('mid range', request('level', [])) ? 'checked' : '' }}> Mid
                                    Range</label><br>
                                <label><input type="checkbox" name="level[]" value="entry level"
                                        {{ in_array('entry level', request('level', [])) ? 'checked' : '' }}> Entry
                                    Level</label>
                            </div>
                        </div>

                        <!-- Harga -->
                        <div class="filter-group">
                            <div class="filter-header" onclick="toggleFilter(this)">
                                <h4>Harga</h4>
                                <i data-lucide="chevron-up" class="arrow"></i>
                            </div>
                            <div class="filter-content">
                                <div class="price-input">
                                    <div class="price-field">
                                        <span class="currency">Rp</span>
                                        <input type="number" name="minPrice" value="{{ request('minPrice') }}"
                                            placeholder="Terendah" min="0">
                                    </div>
                                    <div class="price-field">
                                        <span class="currency">Rp</span>
                                        <input type="number" name="maxPrice" value="{{ request('maxPrice') }}"
                                            placeholder="Tertinggi" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Stok -->
                        <div class="filter-group">
                            <div class="filter-header" onclick="toggleFilter(this)">
                                <h4>Ketersediaan</h4>
                                <i data-lucide="chevron-up" class="arrow"></i>
                            </div>
                            <div class="filter-content">
                                <label><input type="checkbox" name="stock[]" value="tersedia"
                                        {{ in_array('tersedia', request('stock', [])) ? 'checked' : '' }}>
                                    Tersedia</label><br>
                                <label><input type="checkbox" name="stock[]" value="habis"
                                        {{ in_array('habis', request('stock', [])) ? 'checked' : '' }}> Habis</label>
                            </div>
                        </div>
                    </form>
                </aside>

                <!-- Product Grid -->
                <div class="product-grid-wrapper" style="flex:1">
                    {{-- Ringkasan hasil pencarian --}}
                    <div class="search-summary" style="margin-bottom: 20px;">
                        @if ($results->total() > 0)
                            @php
                                // Range produk (misalnya 1–15, 16–30, dst)
                                $from = ($results->currentPage() - 1) * $results->perPage() + 1;
                                $to = min($results->currentPage() * $results->perPage(), $results->total());
                                $sort = request('sort');
                            @endphp

                            <p>
                                Menampilkan <strong>{{ $from }}–{{ $to }}</strong>
                                dari total <strong>{{ $results->total() }}</strong> produk

                                @if ($sort === 'default' || is_null($sort))
                                    paling sesuai
                                @elseif ($sort === 'price-asc')
                                    termurah
                                @elseif ($sort === 'price-desc')
                                    termahal
                                @elseif ($sort === 'newest')
                                    terbaru
                                @endif

                                @if (!empty($keyword))
                                    untuk "<span style="color:#e63946">{{ $keyword }}</span>"
                                @elseif(request()->except(['page', 'sort', 'q']))
                                    berdasarkan filter yang dipilih
                                @endif
                            </p>
                        @else
                            @if (!empty($keyword))
                                <p>Tidak ada hasil untuk "<span style="color:#e63946">{{ $keyword }}</span>"</p>
                            @elseif(request()->except(['page', 'sort', 'q']))
                                <p>Tidak ada hasil berdasarkan filter yang dipilih</p>
                            @else
                                <p>Tidak ada produk ditemukan.</p>
                            @endif
                        @endif
                    </div>

                    <div class="product-grid">
                        @if ($results->count())
                            @foreach ($results as $product)
                                <div class="product-card {{ $product->section === 'promo' ? 'promo-card' : '' }}"
                                    data-name="{{ $product->name }}" data-brand="{{ $product->brand }}"
                                    data-category="{{ $product->category }}" data-level="{{ $product->level }}"
                                    data-image="{{ asset($product->image) }}" data-price="{{ $product->price }}"
                                    data-price-label="Rp {{ number_format($product->price, 0, ',', '.') }}"
                                    data-old-price="{{ $product->old_price }}" data-stock="{{ $product->stock }}">

                                    <!-- Product Image -->
                                    <img class="product-image" src="{{ asset($product->image) }}"
                                        alt="{{ e($product->name) }}" loading="lazy">

                                    <!-- Brand Logo -->
                                    <div class="brand-logo">
                                        <img src="{{ asset('img/brand/' . strtolower($product->brand) . '.png') }}"
                                            alt="{{ e($product->brand) }}">
                                    </div>

                                    <!-- Product Info -->
                                    <h3>{{ $product->name }}</h3>

                                    {{-- Jika produk promo --}}
                                    @if ($product->section === 'promo')
                                        @if (!empty($product->old_price))
                                            <p class="old-price">
                                                Rp {{ number_format($product->old_price, 0, ',', '.') }}
                                            </p>
                                        @endif
                                        <p class="price highlight">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </p>
                                        <span class="discount-badge">{{ $product->discount }}%</span>
                                    @else
                                        <p class="price">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </p>
                                    @endif

                                    <!-- Hidden Specs -->
                                    <span class="hidden product-specs">{{ $product->specs }}</span>

                                    <!-- Button -->
                                    <button class="btn-detail">View Details</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- Pagination -->
                <div class="custom-pagination">
                    {{ $results->links() }}
                </div>
            </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("filterForm");
            if (!form) return;

            // helper: submit form preserving q (hidden input already ada)
            const submitForm = () => form.submit();

            // Auto-submit saat checkbox / radio berubah
            form.querySelectorAll("input[type=checkbox], input[type=radio]").forEach(input => {
                input.addEventListener("change", () => submitForm());
            });

            // submit saat user selesai input min/max (blur) atau tekan Enter
            form.querySelectorAll("input[type=number]").forEach(input => {
                input.addEventListener("blur", () => {
                    // jika ada nilai, submit; kalau kosong, kita bisa pilih tidak submit
                    submitForm();
                });
                input.addEventListener("keypress", e => {
                    if (e.key === "Enter") {
                        e.preventDefault();
                        submitForm();
                    }
                });
            });

            // CLEAR FILTER: hapus semua filter kecuali 'q' lalu submit
            const clearBtn = document.getElementById("clearFiltersBtn");
            if (clearBtn) {
                clearBtn.addEventListener("click", function(e) {
                    // Uncheck checkboxes & radios, clear number/text inputs, reset sort to default
                    form.querySelectorAll("input").forEach(input => {
                        // jangan sentuh hidden q
                        if (input.name === 'q') return;

                        if (input.type === 'checkbox' || input.type === 'radio') {
                            input.checked = false;
                        } else if (input.type === 'number' || input.type === 'text') {
                            input.value = '';
                        }
                        // biarkan input[type=hidden] selain q utuh (jika ada)
                    });

                    // pastikan sort radio balik ke default (jika ada)
                    const defaultSort = form.querySelector('input[name="sort"][value="default"]');
                    if (defaultSort) defaultSort.checked = true;

                    // submit form (q tetap dikirim karena hidden input q ada)
                    submitForm();

                    // Animasi ikon refresh
                    const icon = clearBtn.querySelector("svg");
                    if (icon) {
                        icon.classList.add("spin");
                        setTimeout(() => icon.classList.remove("spin"), 500);
                    }

                    if (typeof applyFilters === "function") {
                        applyFilters();
                    }
                });
            }
        });
    </script>
</x-layout-search>
