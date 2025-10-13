<section class="products-section">
    <div class="container">
        <div class="catalog-layout">

            <!-- Sidebar (Filter) -->
            <aside class="sidebar">
                <div class="filter-header">
                    <h3>Filter Produk</h3>
                    <button id="clearAllFilters" class="clear-btn">
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
                        <label><input type="radio" name="sort" value="default" checked> Paling Sesuai</label><br>
                        <label><input type="radio" name="sort" value="price-asc"> Harga Termurah</label><br>
                        <label><input type="radio" name="sort" value="price-desc"> Harga Termahal</label><br>
                        <label><input type="radio" name="sort" value="newest"> Terbaru</label>
                    </div>
                </div>

                <!-- Level -->
                <div class="filter-group">
                    <div class="filter-header" onclick="toggleFilter(this)">
                        <h4>Kategori</h4>
                        <i data-lucide="chevron-up" class="arrow"></i>
                    </div>
                    <div class="filter-content">
                        <label><input type="checkbox" data-type="level" value="flagship"> Flagship</label><br>
                        <label><input type="checkbox" data-type="level" value="high range"> High Range</label><br>
                        <label><input type="checkbox" data-type="level" value="mid range"> Mid Range</label><br>
                        <label><input type="checkbox" data-type="level" value="entry level"> Entry Level</label>
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
                                <input type="number" id="minPrice" placeholder="Terendah" min="0">
                            </div>
                            <div class="price-field">
                                <span class="currency">Rp</span>
                                <input type="number" id="maxPrice" placeholder="Tertinggi" min="0">
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
                        <label><input type="checkbox" data-type="stock" value="tersedia"> Tersedia</label><br>
                        <label><input type="checkbox" data-type="stock" value="habis"> Habis</label>
                    </div>
                </div>
            </aside>

            <!-- Filter Toogle for Mobile -->
            <div class="filter-toggle">
                <button id="filterBtn">
                    <i class="fas fa-sliders-h"></i> Filter
                </button>
            </div>

            <!-- Product Grid -->
            <div class="product-grid">
                @foreach ($products as $product)
                    <div class="product-card" data-name="{{ $product->name }}" data-brand="{{ $product->brand }}"
                        data-category="{{ $product->category }}" data-level="{{ $product->level }}"
                        data-image="{{ asset($product->image) }}" data-price="{{ $product->price }}"
                        data-price-label="Rp {{ number_format($product->price, 0, ',', '.') }}"
                        data-stock="{{ $product->stock }}">

                        <!-- Product Image -->
                        <img class="product-image" src="{{ asset($product->image) }}" alt="{{ e($product->name) }}"
                            loading="lazy">

                        <!-- Brand Logo -->
                        <div class="brand-logo">
                            <img src="{{ asset('img/brand/' . strtolower($product->brand) . '.png') }}"
                                alt="{{ e($product->brand) }}">
                        </div>

                        <!-- Product Info -->
                        <h3>{{ $product->name }}</h3>
                        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                        <!-- Hidden Specs -->
                        <span class="hidden product-specs">{{ $product->specs }}</span>

                        <!-- Button -->
                        <button class="btn-detail">View Details</button>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Pagination -->
        <div class="custom-pagination">
            {{ $products->links() }}
        </div>

        <style>
            .custom-pagination {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 40px;
                margin-bottom: 40px;
            }

            .custom-pagination nav {
                display: flex;
                justify-content: center;
            }

            .custom-pagination .pagination {
                display: flex;
                gap: 8px;
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .custom-pagination .pagination li {
                display: inline-flex;
            }

            .custom-pagination .pagination li a,
            .custom-pagination .pagination li span {
                display: inline-block;
                padding: 8px 14px;
                border-radius: 8px;
                border: 1px solid #ddd;
                text-decoration: none;
                color: #333;
                font-size: 14px;
                transition: all 0.3s ease;
            }

            .custom-pagination .pagination li a:hover {
                background-color: #e63946;
                /* merah seperti tombol kamu */
                color: #fff;
                border-color: #e63946;
            }

            .custom-pagination .pagination li.active span {
                background-color: #e63946;
                color: #fff;
                border-color: #e63946;
                font-weight: 600;
            }

            .custom-pagination .pagination li.disabled span {
                color: #aaa;
                border-color: #ddd;
                background-color: #f9f9f9;
                cursor: not-allowed;
            }
        </style>
</section>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Render lucide icons
        lucide.createIcons();

        // Target tombol clear
        const clearBtn = document.getElementById("clearAllFilters");

        if (clearBtn) {
            clearBtn.addEventListener("click", (e) => {
                e.preventDefault();

                // Reset semua filter input
                document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
                document.querySelectorAll('input[type="radio"][name="sort"]').forEach(r => {
                    if (r.value === "default") r.checked = true;
                });
                const minPrice = document.getElementById("minPrice");
                const maxPrice = document.getElementById("maxPrice");
                if (minPrice) minPrice.value = "";
                if (maxPrice) maxPrice.value = "";

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
