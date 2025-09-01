<!-- Product Section -->
<section class="products-section">
    <div class="container">

        <!-- Catalog Layout (Sidebar + Grid) -->
        <div class="catalog-layout">
            <!-- Sidebar -->
            <aside class="sidebar">
                <div class="filter-header">
                    <h3>Filter Produk</h3>
                    <button id="clearAllFilters" class="clear-btn">Clear Filter</button>
                </div>


                <!-- Sorting -->
                <div class="filter-group">
                    <div class="filter-header" onclick="toggleFilter(this)">
                        <h4>Urutkan</h4>
                        <i data-lucide="chevron-up" class="arrow"></i>
                    </div>
                    <div class="filter-content">
                        <label>
                            <input type="radio" name="sort" value="default" checked>
                            Paling Sesuai
                        </label><br>
                        <label>
                            <input type="radio" name="sort" value="price-asc">
                            Harga Termurah
                        </label><br>
                        <label>
                            <input type="radio" name="sort" value="price-desc">
                            Harga Termahal
                        </label><br>
                        <label>
                            <input type="radio" name="sort" value="newest">
                            Terbaru
                        </label>
                    </div>
                </div>

                <!-- Kategori -->
                <div class="filter-group">
                    <div class="filter-header" onclick="toggleFilter(this)">
                        <h4>Kategori</h4>
                        <i data-lucide="chevron-up" class="arrow"></i>
                    </div>
                    <div class="filter-content">
                        <label><input type="checkbox" data-type="category" value="flagship"> Flagship</label><br>
                        <label><input type="checkbox" data-type="category" value="high range"> High
                            Range</label><br>
                        <label><input type="checkbox" data-type="category" value="mid range"> Mid
                            Range</label><br>
                        <label><input type="checkbox" data-type="category" value="entry level"> Entry
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
                                <input type="number" id="minPrice" placeholder="Terendah" min="0">
                            </div>
                            <div class="price-field">
                                <span class="currency">Rp</span>
                                <input type="number" id="maxPrice" placeholder="Tertinggi" min="0">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stok (opsional) -->
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

            <!-- Product Grid -->
            <div class="product-grid">
                <!-- Card Produk -->
                <div class="product-card" data-category="flagship" data-brand="apple" data-date="2025-02-01"
                    data-stock="tersedia" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                    <img class="product-image" src="img/category/iphone15pm.png" alt="iPhone 15 Pro Max" loading="lazy">
                    <div class="brand-logo">
                        <img src="img/brand/apple.png" alt="Apple">
                    </div>
                    <h3>iPhone 15 Pro Max</h3>
                    <p class="price">Rp 20.000.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="flagship" data-brand="apple" data-date="2025-02-01"
                    data-stock="habis" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                    <img class="product-image" src="img/category/iphone16plus.png" alt="iPhone 15" loading="lazy">
                    <div class="brand-logo">
                        <img src="img/brand/apple.png" alt="Apple">
                    </div>
                    <h3>iPhone 16 Plus</h3>
                    <p class="price">Rp 15.999.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="flagship" data-brand="apple" data-date="2025-02-01"
                    data-stock="tersedia" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                    <img class="product-image" src="img/category/iphone16pro.png" alt="iPhone 15" loading="lazy">
                    <div class="brand-logo">
                        <img src="img/brand/apple.png" alt="Apple">
                    </div>
                    <h3>iPhone 16 Pro Max</h3>
                    <p class="price">Rp 21.999.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="flagship" data-brand="samsung" data-date="2025-08-01"
                    data-stock="tersedia" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                    <img class="product-image" src="img/category/samsung25.png" alt="Samsung Galaxy S26 Ultra"
                        loading="lazy">
                    <div class="brand-logo">
                        <img src="img/brand/samsung.png" alt="Apple">
                    </div>
                    <h3>Samsung Galaxy S26 Ultra</h3>
                    <p class="price">Rp 20.999.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="mid range" data-brand="samsung" data-date="2025-01-01"
                    data-stock="tersedia" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                    <img class="product-image" src="img/category/samsung55.png" alt="Samsung Galaxy A55"
                        loading="lazy">
                    <div class="brand-logo">
                        <img src="img/brand/samsung.png" alt="Apple">
                    </div>
                    <h3>Samsung Galaxy A55</h3>
                    <p class="price">Rp 5.899.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="mid range" data-brand="samsung" data-date="2025-06-01"
                    data-stock="tersedia" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                    <img class="product-image" src="img/category/samsung56.png" alt="Samsung Galaxy A56"
                        loading="lazy">
                    <div class="brand-logo">
                        <img src="img/brand/samsung.png" alt="Apple">
                    </div>
                    <h3>Samsung Galaxy A56</h3>
                    <p class="price">Rp 6.999.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="high range" data-brand="apple" data-date="2025-02-01"
                    data-stock="tersedia" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                    <img class="product-image" src="img/category/iphone15pm.png" alt="iPhone 15" loading="lazy">
                    <h3>iPhone 15</h3>
                    <p class="price">Rp 15.000.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="flagship" data-brand="apple" data-date="2025-02-01"
                    data-stock="tersedia" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                    <img class="product-image" src="img/category/iphone15pm.png" alt="iPhone 15" loading="lazy">
                    <h3>iPhone 15</h3>
                    <p class="price">Rp 15.000.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="flagship" data-brand="apple" data-date="2025-02-01"
                    data-stock="tersedia" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                    <img class="product-image" src="img/category/iphone15pm.png" alt="iPhone 15" loading="lazy">
                    <h3>iPhone 15</h3>
                    <p class="price">Rp 15.000.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="flagship" data-brand="apple" data-date="2025-02-01"
                    data-stock="tersedia" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                    <img class="product-image" src="img/category/iphone15pm.png" alt="iPhone 15" loading="lazy">
                    <h3>iPhone 15</h3>
                    <p class="price">Rp 15.000.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="flagship" data-brand="apple" data-date="2025-02-01"
                    data-stock="tersedia" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                    <img class="product-image" src="img/category/iphone15pm.png" alt="iPhone 15" loading="lazy">
                    <h3>iPhone 15</h3>
                    <p class="price">Rp 15.000.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="flagship" data-brand="apple" data-date="2025-02-01"
                    data-stock="tersedia" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                    <img class="product-image" src="img/category/iphone15pm.png" alt="iPhone 15" loading="lazy">
                    <h3>iPhone 15</h3>
                    <p class="price">Rp 15.000.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="flagship" data-brand="apple" data-date="2025-02-01"
                    data-stock="tersedia" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                    <img class="product-image" src="img/category/iphone15pm.png" alt="iPhone 15" loading="lazy">
                    <h3>iPhone 15</h3>
                    <p class="price">Rp 15.000.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="flagship" data-brand="apple" data-date="2025-02-01"
                    data-stock="tersedia" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                    <img class="product-image" src="img/category/iphone15pm.png" alt="iPhone 15" loading="lazy">
                    <h3>iPhone 15</h3>
                    <p class="price">Rp 15.000.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="flagship" data-brand="apple" data-date="2025-02-01"
                    data-stock="tersedia" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                    <img class="product-image" src="img/category/iphone15pm.png" alt="iPhone 15" loading="lazy">
                    <h3>iPhone 15</h3>
                    <p class="price">Rp 15.000.000</p>
                    <button class="btn-detail">View Details</button>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <button class="prev-page">‹</button>
            <div class="page-numbers"></div>
            <button class="next-page">›</button>
        </div>
</section>
