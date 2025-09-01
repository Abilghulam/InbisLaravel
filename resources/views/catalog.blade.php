<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalog - Indo Bismar Group</title>
    <link rel="stylesheet" href="css/catalog.css">

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lato&family=Montserrat:wght@400;600;700&family=Merriweather:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nata+Sans:wght@100..900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nata+Sans:wght@100..900&family=Noto+Sans+JP:wght@100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap"
        rel="stylesheet">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar-section" id="navbar">
        <div class="nav-container">
            <!-- Logo -->
            <a href="/" class="logo">
                <img src="img/logo.webp" alt="Logo"
                    style="height: 45px; margin-right: 20px; vertical-align: bottom" />
                Bismar<span>Catalog</span>
            </a>

            <!-- Search Box -->
            <form class="search-box">
                <input type="text" placeholder="Search in Catalog" />
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>

            <!-- Menu -->
            <ul class="nav-menu" id="nav-menu">
                <li><a href="/" class="nav-link">Home</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-slider">
            <div class="slide"><img src="img/poster/poster1.jpg" alt="Promotion 1" loading="lazy"></div>
            <div class="slide"><img src="img/poster/poster2.jpg" alt="Promotion 2" loading="lazy"></div>
            <div class="slide"><img src="img/poster/poster3.jpg" alt="Promotion 3" loading="lazy"></div>
            <div class="slide"><img src="img/poster/poster4.jpg" alt="Promotion 4" loading="lazy"></div>
            <div class="slide"><img src="img/poster/poster5.jpg" alt="Promotion 5" loading="lazy"></div>
            <div class="slide"><img src="img/poster/poster6.jpg" alt="Promotion 6" loading="lazy"></div>
            <div class="slide"><img src="img/poster/poster7.jpg" alt="Promotion 7" loading="lazy"></div>
            <div class="slide"><img src="img/poster/poster8.jpg" alt="Promotion 8" loading="lazy"></div>
            <div class="slide"><img src="img/poster/poster9.jpg" alt="Promotion 9" loading="lazy"></div>
            <div class="slide"><img src="img/poster/poster10.jpg" alt="Promotion 10" loading="lazy"></div>
            <div class="slide"><img src="img/poster/poster11.jpg" alt="Promotion 11" loading="lazy"></div>
            <div class="slide"><img src="img/poster/poster14.jpg" alt="Promotion 14" loading="lazy"></div>
        </div>

        <!-- Navigation -->
        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>

        <!-- Dots -->
        <div class="dots"></div>
    </section>

    <!-- Breadcrumb -->
    <nav class="breadcrumb-card-section">
        <a href="/">Home</a>
        <span class="separator">›</span>
        <a href="/catalog">Catalog</a>
        <span class="separator">›</span>
        <span class="current">Semua Produk</span>
    </nav>

    <!-- Recommendation Section -->
    <section class="recommendation-section">
        <div class="container">
            <h2 class="recommendation-title">Rekomendasi terbaik buatmu
                <a href="#" class="see-all-btn">Lihat Semua <span>›</span></a>
            </h2>

            <!-- Wrapper untuk scroll -->
            <div class="recommendation-wrapper">
                <button class="scroll-btn left">‹</button>

                <div class="recommendation-scroll">
                    <!-- Card recommendation -->
                    <div class="recommendation-card">
                        <div class="brand-logo">
                            <img src="img/brand/apple.png" alt="Apple">
                        </div>
                        <img class="recommendation-image" src="img/category/iphone15pm.png" alt="iPhone 15"
                            loading="lazy">
                        <h3>iPhone 15</h3>
                        <p class="price">Rp 15.000.000</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>

                    <div class="recommendation-card">
                        <div class="brand-logo">
                            <img src="img/brand/samsung.png" alt="Samsung">
                        </div>
                        <img class="recommendation-image" src="img/category/samsung25.png" alt="Samsung S24"
                            loading="lazy">
                        <h3>Samsung Galaxy S24</h3>
                        <p class="price">Rp 13.500.000</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>

                    <div class="recommendation-card">
                        <div class="brand-logo">
                            <img src="img/brand/oppo.png" alt="Oppo">
                        </div>
                        <img class="recommendation-image" src="img/category/oppo.png" alt="Oppo Reno 14 Pro"
                            loading="lazy">
                        <h3>Oppo Reno 14 Pro</h3>
                        <p class="price">Rp 25.000.000</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>

                    <div class="recommendation-card">
                        <div class="brand-logo">
                            <img src="img/brand/vivo.png" alt="Vivo">
                        </div>
                        <img class="recommendation-image" src="img/category/vivo.png" alt="Vivo X200 Pro"
                            loading="lazy">
                        <h3>Vivo Y200</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>

                    <div class="recommendation-card">
                        <div class="brand-logo">
                            <img src="img/brand/vivo.png" alt="Vivo">
                        </div>
                        <img class="recommendation-image" src="img/category/vivo200.png" alt="Vivo X200 Pro"
                            loading="lazy">
                        <h3>Vivo X200 Pro</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>

                    <div class="recommendation-card">
                        <div class="brand-logo">
                            <img src="img/brand/samsung.png" alt="Samsung">
                        </div>
                        <img class="recommendation-image" src="img/category/samsung56.png" alt="Vivo X200 Pro"
                            loading="lazy">
                        <h3>Samsung Galaxy A56</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>

                    <div class="recommendation-card">
                        <div class="brand-logo">
                            <img src="img/brand/apple.png" alt="Apple">
                        </div>
                        <img class="recommendation-image" src="img/category/iphone16pro.png" alt="Vivo X200 Pro"
                            loading="lazy">
                        <h3>Iphone 16 Pro Max</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>

                    <div class="recommendation-card">
                        <div class="brand-logo">
                            <img src="img/brand/samsung.png" alt="Samsung">
                        </div>
                        <img class="recommendation-image" src="img/category/samsung55.png" alt="Vivo X200 Pro"
                            loading="lazy">
                        <h3>Samsung Galaxy A55</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>
                </div>

                <button class="scroll-btn right">›</button>
            </div>
        </div>
    </section>

    <!-- Promo Section -->
    <section class="promo-section">
        <div class="container">
            <h2 class="promo-title">Promo spesial HUT RI ke 80
                <a href="#" class="see-all-btn">Lihat Semua <span>›</span></a>
            </h2>

            <!-- Wrapper untuk scroll -->
            <div class="promo-wrapper">
                <button class="scroll-btn left">‹</button>

                <div class="promo-scroll">
                    <!-- Card Promo -->
                    <div class="promo-card">
                        <div class="discount-badge">-15%</div>
                        <div class="brand-logo">
                            <img src="img/brand/apple.png" alt="Apple">
                        </div>
                        <img class="promo-image" src="img/category/iphone15pm.png" alt="iPhone 15" loading="lazy">
                        <h3>iPhone 15</h3>
                        <p class="price">Rp 15.000.000</p>
                        <button class="btn-promo">View Details</button>
                    </div>

                    <div class="promo-card">
                        <div class="discount-badge">-15%</div>
                        <div class="brand-logo">
                            <img src="img/brand/samsung.png" alt="Samsung">
                        </div>
                        <img class="promo-image" src="img/category/samsung25.png" alt="Samsung S24" loading="lazy">
                        <h3>Samsung Galaxy S24</h3>
                        <p class="price">Rp 13.500.000</p>
                        <button class="btn-promo">View Details</button>
                    </div>

                    <div class="promo-card">
                        <div class="discount-badge">-30%</div>
                        <div class="brand-logo">
                            <img src="img/brand/oppo.png" alt="Oppo">
                        </div>
                        <img class="promo-image" src="img/category/oppo.png" alt="Oppo Reno 14 Pro" loading="lazy">
                        <h3>Oppo Reno 14 Pro</h3>
                        <p class="price">Rp 25.000.000</p>
                        <button class="btn-promo">View Details</button>
                    </div>

                    <div class="promo-card">
                        <div class="discount-badge">-10%</div>
                        <div class="brand-logo">
                            <img src="img/brand/vivo.png" alt="Vivo">
                        </div>
                        <img class="promo-image" src="img/category/vivo.png" alt="Vivo X200 Pro" loading="lazy">
                        <h3>Vivo Y200</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-promo">View Details</button>
                    </div>

                    <div class="promo-card">
                        <div class="discount-badge">-10%</div>
                        <div class="brand-logo">
                            <img src="img/brand/vivo.png" alt="Vivo">
                        </div>
                        <img class="promo-image" src="img/category/vivo200.png" alt="Vivo X200 Pro" loading="lazy">
                        <h3>Vivo X200 Pro</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-promo">View Details</button>
                    </div>

                    <div class="promo-card">
                        <div class="discount-badge">-10%</div>
                        <div class="brand-logo">
                            <img src="img/brand/samsung.png" alt="Samsung">
                        </div>
                        <img class="promo-image" src="img/category/samsung56.png" alt="Vivo X200 Pro"
                            loading="lazy">
                        <h3>Samsung Galaxy A56</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-promo">View Details</button>
                    </div>

                    <div class="promo-card">
                        <div class="discount-badge">-10%</div>
                        <div class="brand-logo">
                            <img src="img/brand/apple.png" alt="Apple">
                        </div>
                        <img class="promo-image" src="img/category/iphone16pro.png" alt="Vivo X200 Pro"
                            loading="lazy">
                        <h3>Iphone 16 Pro Max</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-promo">View Details</button>
                    </div>

                    <div class="promo-card">
                        <div class="discount-badge">-10%</div>
                        <div class="brand-logo">
                            <img src="img/brand/samsung.png" alt="Samsung">
                        </div>
                        <img class="promo-image" src="img/category/samsung55.png" alt="Vivo X200 Pro"
                            loading="lazy">
                        <h3>Samsung Galaxy A55</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-promo">View Details</button>
                    </div>
                </div>

                <button class="scroll-btn right">›</button>
            </div>
        </div>
    </section>

    <!-- Latest Product Section -->
    <section class="latest-section">
        <div class="container">
            <h2 class="latest-title">Produk terbaru menarik
                <a href="#" class="see-all-btn">Lihat Semua <span>›</span></a>
            </h2>

            <!-- Wrapper untuk scroll -->
            <div class="latest-wrapper">
                <button class="scroll-btn left">‹</button>

                <div class="latest-scroll">
                    <!-- Card latest -->
                    <div class="latest-card">
                        <div class="brand-logo">
                            <img src="img/brand/apple.png" alt="Apple">
                        </div>
                        <img class="latest-image" src="img/category/iphone15pm.png" alt="iPhone 15" loading="lazy">
                        <h3>iPhone 15</h3>
                        <p class="price">Rp 15.000.000</p>
                        <button class="btn-latest">View Details</button>
                    </div>

                    <div class="latest-card">
                        <div class="brand-logo">
                            <img src="img/brand/samsung.png" alt="Samsung">
                        </div>
                        <img class="latest-image" src="img/category/samsung25.png" alt="Samsung S24" loading="lazy">
                        <h3>Samsung Galaxy S24</h3>
                        <p class="price">Rp 13.500.000</p>
                        <button class="btn-latest">View Details</button>
                    </div>

                    <div class="latest-card">
                        <div class="brand-logo">
                            <img src="img/brand/oppo.png" alt="Oppo">
                        </div>
                        <img class="latest-image" src="img/category/oppo.png" alt="Oppo Reno 14 Pro" loading="lazy">
                        <h3>Oppo Reno 14 Pro</h3>
                        <p class="price">Rp 25.000.000</p>
                        <button class="btn-latest">View Details</button>
                    </div>

                    <div class="latest-card">
                        <div class="brand-logo">
                            <img src="img/brand/vivo.png" alt="Vivo">
                        </div>
                        <img class="latest-image" src="img/category/vivo.png" alt="Vivo X200 Pro" loading="lazy">
                        <h3>Vivo Y200</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-latest">View Details</button>
                    </div>

                    <div class="latest-card">
                        <div class="brand-logo">
                            <img src="img/brand/vivo.png" alt="Vivo">
                        </div>
                        <img class="latest-image" src="img/category/vivo200.png" alt="Vivo X200 Pro" loading="lazy">
                        <h3>Vivo X200 Pro</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-latest">View Details</button>
                    </div>

                    <div class="latest-card">
                        <div class="brand-logo">
                            <img src="img/brand/samsung.png" alt="Samsung">
                        </div>
                        <img class="latest-image" src="img/category/samsung56.png" alt="Vivo X200 Pro"
                            loading="lazy">
                        <h3>Samsung Galaxy A56</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-latest">View Details</button>
                    </div>

                    <div class="latest-card">
                        <div class="brand-logo">
                            <img src="img/brand/apple.png" alt="Apple">
                        </div>
                        <img class="latest-image" src="img/category/iphone16pro.png" alt="Vivo X200 Pro"
                            loading="lazy">
                        <h3>Iphone 16 Pro Max</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-latest">View Details</button>
                    </div>

                    <div class="latest-card">
                        <div class="brand-logo">
                            <img src="img/brand/samsung.png" alt="Samsung">
                        </div>
                        <img class="latest-image" src="img/category/samsung55.png" alt="Vivo X200 Pro"
                            loading="lazy">
                        <h3>Samsung Galaxy A55</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-latest">View Details</button>
                    </div>
                </div>

                <button class="scroll-btn right">›</button>
            </div>
        </div>
    </section>

    <!-- Brands Section -->
    <section class="brands-section">
        <div class="container">
            <h2 class="title-section">Kategori Brand</h2>
            <div class="brand-grid">
                <a href="#" class="brand-card" data-brand="apple">
                    <img src="img/brand/apple.png" alt="Iphone" loading="lazy">
                </a>
                <a href="#" class="brand-card" data-brand="samsung">
                    <img src="img/brand/samsung.png" alt="Samsung" loading="lazy">
                </a>
                <a href="#" class="brand-card" data-brand="vivo">
                    <img src="img/brand/vivo.png" alt="Vivo" loading="lazy">
                </a>
                <a href="#" class="brand-card" data-brand="oppo">
                    <img src="img/brand/oppo.png" alt="Oppo" loading="lazy">
                </a>
                <a href="#" class="brand-card" data-brand="xiaomi">
                    <img src="img/brand/xiaomi1.png" alt="Xiaomi" loading="lazy">
                </a>
                <a href="#" class="brand-card" data-brand="poco">
                    <img src="img/brand/poco.png" alt="Poco" loading="lazy">
                </a>
                <a href="#" class="brand-card" data-brand="realme">
                    <img src="img/brand/realme.png" alt="Realme" loading="lazy">
                </a>
                <a href="#" class="brand-card" data-brand="infinix">
                    <img src="img/brand/infinix.png" alt="Infinix" loading="lazy">
                </a>
            </div>
        </div>
    </section>

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
                        <img class="product-image" src="img/category/iphone15pm.png" alt="iPhone 15 Pro Max"
                            loading="lazy">
                        <div class="brand-logo">
                            <img src="img/brand/apple.png" alt="Apple">
                        </div>
                        <h3>iPhone 15 Pro Max</h3>
                        <p class="price">Rp 20.000.000</p>
                        <button class="btn-detail">View Details</button>
                    </div>

                    <div class="product-card" data-category="flagship" data-brand="apple" data-date="2025-02-01"
                        data-stock="habis" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                        <img class="product-image" src="img/category/iphone16plus.png" alt="iPhone 15"
                            loading="lazy">
                        <div class="brand-logo">
                            <img src="img/brand/apple.png" alt="Apple">
                        </div>
                        <h3>iPhone 16 Plus</h3>
                        <p class="price">Rp 15.999.000</p>
                        <button class="btn-detail">View Details</button>
                    </div>

                    <div class="product-card" data-category="flagship" data-brand="apple" data-date="2025-02-01"
                        data-stock="tersedia" data-specs="Layar: 6.1 inci OLED<br>Kamera: 48MP<br>Baterai: 4000mAh">
                        <img class="product-image" src="img/category/iphone16pro.png" alt="iPhone 15"
                            loading="lazy">
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

    <!-- View Details Modal -->
    <div id="productModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>

            <div class="modal-body">
                <div class="modal-image">
                    <img id="modalProductImage" src="" alt="Product Image">
                </div>
                <div class="modal-info">
                    <h2 id="modalProductTitle"></h2>
                    <p class="modal-price" id="modalProductPrice"></p>
                    <p class="modal-stock" id="modalProductStock"></p>
                    <div class="modal-specs" id="modalProductSpecs">
                        <!-- Spesifikasi produk masuk di sini -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-logo">
                    <img src="img/logo.webp" alt="Indo Bismar Group" />
                    <h1>IndoBismar <span class="highlight">Group</span></h1>
                </div>
                <div class="footer-social">
                    <span>Ikuti Kami :</span>
                    <a href="#"><img src="img/social/instagram.png" alt="Instagram"></a>
                    <a href="#"><img src="img/social/tiktok.png" alt="Tiktok"></a>
                    <a href="#"><img src="img/social/whatsapp.png" alt="WhatsApp"></a>
                    <a href="#"><img src="img/social/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="img/social/x.webp" alt="X"></a>
                    <a href="#"><img src="img/social/youtube.png" alt="YouTube"></a>
                </div>
            </div>

            <div class="footer-main">
                <!-- Kategori Produk -->
                <div class="footer-col">
                    <h4>Kategori Produk</h4>
                    <ul>
                        <li><a href="#">Laptop & Notebook</a></li>
                        <li><a href="#">Dekstop Computer</a></li>
                        <li><a href="#">Smartphone</a></li>
                        <li><a href="#">IT Accessories</a></li>
                    </ul>
                </div>

                <!-- Kategori Brand -->
                <div class="footer-col">
                    <h4>Kategori Brand</h4>
                    <ul>
                        <li><a href="#">Apple</a></li>
                        <li><a href="#">Samsung</a></li>
                        <li><a href="#">Vivo</a></li>
                        <li><a href="#">Oppo</a></li>
                        <li><a href="#">Xiaomi</a></li>
                    </ul>
                </div>

                <!-- Hubungi Kami -->
                <div class="footer-col">
                    <h4>Hubungi Kami</h4>
                    <ul>
                        <li><i data-lucide="phone"
                                style="width: 16px;height: 16px;margin-right: 5px;vertical-align: middle;"></i> Call
                            Center (031) 8474685
                            <br><small style="margin-left: 25px;">(Operasional Layanan 24/7)</small>
                        </li>
                        <li><i data-lucide="clock"
                                style="width: 16px;height: 16px;margin-right: 5px;vertical-align: middle;"></i> Jam
                            Operasional
                            <br><small style="margin-left: 25px;">(Senin - Jumat: 08.30 -
                                17.00 WIB)</small>
                        </li>
                        <li><i data-lucide="mail"
                                style="width: 16px;height: 16px;margin-right: 5px;vertical-align: middle;"></i> <a
                                href="mailto:bismar@ptindobismar.com">bismar@ptindobismar.com</a>
                        </li>
                    </ul>
                </div>

                <!-- Kerjasama -->
                <div class="footer-col">
                    <h4>Bekerjasama Dengan</h4>
                    <img src="img/partner/biz-removebg-preview.png" alt="Partner" class="partner-logo" />
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025. All rights reserved by Indo Bismar Group</p>
            </div>
        </div>
    </footer>

    <script src="js/catalog.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        lucide.createIcons();
    </script>

</body>

</html>
