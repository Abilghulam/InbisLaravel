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
            <div class="slide"><img src="img/poster/poster1.jpg" alt="Promotion 1"></div>
            <div class="slide"><img src="img/poster/poster2.jpg" alt="Promotion 2"></div>
            <div class="slide"><img src="img/poster/poster3.jpg" alt="Promotion 3"></div>
            <div class="slide"><img src="img/poster/poster4.jpg" alt="Promotion 4"></div>
            <div class="slide"><img src="img/poster/poster5.jpg" alt="Promotion 5"></div>
            <div class="slide"><img src="img/poster/poster6.jpg" alt="Promotion 6"></div>
            <div class="slide"><img src="img/poster/poster7.jpg" alt="Promotion 7"></div>
            <div class="slide"><img src="img/poster/poster8.jpg" alt="Promotion 8"></div>
            <div class="slide"><img src="img/poster/poster9.jpg" alt="Promotion 9"></div>
            <div class="slide"><img src="img/poster/poster10.jpg" alt="Promotion 10"></div>
            <div class="slide"><img src="img/poster/poster11.jpg" alt="Promotion 11"></div>
            <div class="slide"><img src="img/poster/poster14.jpg" alt="Promotion 14"></div>
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
            <h2 class="recommendation-title">Rekomendasi terbaik buatmu</h2>

            <!-- Wrapper untuk scroll -->
            <div class="recommendation-wrapper">
                <button class="scroll-btn left">‹</button>

                <div class="recommendation-scroll">
                    <!-- Card recommendation -->
                    <div class="recommendation-card">
                        <img src="img/category/iphone15.png" alt="iPhone 15">
                        <h3>iPhone 15</h3>
                        <p class="price">Rp 15.000.000</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>

                    <div class="recommendation-card">
                        <img src="img/category/samsung.png" alt="Samsung S24">
                        <h3>Samsung Galaxy S24</h3>
                        <p class="price">Rp 13.500.000</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>

                    <div class="recommendation-card">
                        <img src="img/category/oppo.png" alt="Oppo Reno 14 Pro">
                        <h3>Oppo Reno 14 Pro</h3>
                        <p class="price">Rp 25.000.000</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>

                    <div class="recommendation-card">
                        <img src="img/category/vivo.png" alt="Vivo X200 Pro">
                        <h3>Vivo Y200</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>

                    <div class="recommendation-card">
                        <img src="img/category/vivo200.png" alt="Vivo X200 Pro">
                        <h3>Vivo X200 Pro</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>

                    <div class="recommendation-card">
                        <img src="img/category/samsung56.png" alt="Vivo X200 Pro">
                        <h3>Samsung Galaxy A56</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>

                    <div class="recommendation-card">
                        <img src="img/category/iphone16pro.png" alt="Vivo X200 Pro">
                        <h3>Iphone 16 Pro Max</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-recommendation">View Details</button>
                    </div>

                    <div class="recommendation-card">
                        <img src="img/category/samsung55.png" alt="Vivo X200 Pro">
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
            <h2 class="promo-title">Promo spesial HUT RI ke 80</h2>

            <!-- Wrapper untuk scroll -->
            <div class="promo-wrapper">
                <button class="scroll-btn left">‹</button>

                <div class="promo-scroll">
                    <!-- Card Promo -->
                    <div class="promo-card">
                        <div class="discount-badge">-15%</div>
                        <img src="img/category/iphone15.png" alt="iPhone 15">
                        <h3>iPhone 15</h3>
                        <p class="price">Rp 15.000.000</p>
                        <button class="btn-promo">View Details</button>
                    </div>

                    <div class="promo-card">
                        <div class="discount-badge">-15%</div>
                        <img src="img/category/samsung.png" alt="Samsung S24">
                        <h3>Samsung Galaxy S24</h3>
                        <p class="price">Rp 13.500.000</p>
                        <button class="btn-promo">View Details</button>
                    </div>

                    <div class="promo-card">
                        <div class="discount-badge">-30%</div>
                        <img src="img/category/oppo.png" alt="Oppo Reno 14 Pro">
                        <h3>Oppo Reno 14 Pro</h3>
                        <p class="price">Rp 25.000.000</p>
                        <button class="btn-promo">View Details</button>
                    </div>

                    <div class="promo-card">
                        <div class="discount-badge">-10%</div>
                        <img src="img/category/vivo.png" alt="Vivo X200 Pro">
                        <h3>Vivo Y200</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-promo">View Details</button>
                    </div>

                    <div class="promo-card">
                        <div class="discount-badge">-10%</div>
                        <img src="img/category/vivo200.png" alt="Vivo X200 Pro">
                        <h3>Vivo X200 Pro</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-promo">View Details</button>
                    </div>

                    <div class="promo-card">
                        <div class="discount-badge">-10%</div>
                        <img src="img/category/samsung56.png" alt="Vivo X200 Pro">
                        <h3>Samsung Galaxy A56</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-promo">View Details</button>
                    </div>

                    <div class="promo-card">
                        <div class="discount-badge">-10%</div>
                        <img src="img/category/iphone16pro.png" alt="Vivo X200 Pro">
                        <h3>Iphone 16 Pro Max</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-promo">View Details</button>
                    </div>

                    <div class="promo-card">
                        <div class="discount-badge">-10%</div>
                        <img src="img/category/samsung55.png" alt="Vivo X200 Pro">
                        <h3>Samsung Galaxy A55</h3>
                        <p class="price">Rp 18.000.000</p>
                        <button class="btn-promo">View Details</button>
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
                <a href="#" class="brand-card">
                    <img src="img/brand/apple.png" alt="Iphone">
                </a>
                <a href="#" class="brand-card">
                    <img src="img/brand/samsung.png" alt="Samsung">
                </a>
                <a href="#" class="brand-card">
                    <img src="img/brand/vivo.png" alt="Vivo">
                </a>
                <a href="#" class="brand-card">
                    <img src="img/brand/oppo.png" alt="Oppo">
                </a>
                <a href="#" class="brand-card">
                    <img src="img/brand/xiaomi1.png" alt="Xiaomi">
                </a>
                <a href="#" class="brand-card">
                    <img src="img/brand/poco.png" alt="Poco">
                </a>
                <a href="#" class="brand-card">
                    <img src="img/brand/realme.png" alt="Realme">
                </a>
                <a href="#" class="brand-card">
                    <img src="img/brand/infinix.png" alt="Infinix">
                </a>
            </div>
        </div>
    </section>

    <!-- Product Section -->
    <section class="products-section">
        <div class="container">
            <!-- Filter & Sort Bar -->
            <div class="filter-sort-bar">
                <div class="filter">
                    <label for="category">Kategori:</label>
                    <select id="category">
                        <option value="all">Semua</option>
                        <option value="smartphone">Flagship</option>
                        <option value="laptop">High Range</option>
                        <option value="tablet">Mid Range</option>
                        <option value="aksesori">Entry Level</option>
                    </select>
                </div>

                <div class="sort">
                    <label for="sort">Urutkan:</label>
                    <select id="sort">
                        <option value="default">Default</option>
                        <option value="price-asc">Harga Termurah</option>
                        <option value="price-desc">Harga Termahal</option>
                        <option value="newest">Terbaru</option>
                    </select>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="product-grid">
                <!-- Card Produk -->
                <div class="product-card" data-category="smartphone">
                    <img src="img/category/iphone15.png" alt="iPhone 15">
                    <h3>iPhone 15</h3>
                    <p class="price">Rp 15.000.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="smartphone">
                    <img src="img/category/samsung.png" alt="Samsung S24">
                    <h3>Samsung Galaxy S24</h3>
                    <p class="price">Rp 13.500.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="laptop">
                    <img src="img/category/oppo.png" alt="MacBook Pro">
                    <h3>Oppo Reno 14 Pro</h3>
                    <p class="price">Rp 25.000.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="tablet">
                    <img src="img/category/vivo.png" alt="iPad Pro">
                    <h3>Vivo X200 Pro</h3>
                    <p class="price">Rp 18.000.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="aksesori">
                    <img src="img/category/xiaomi.png" alt="AirPods Pro">
                    <h3>Xiaomi Note 14T Pro</h3>
                    <p class="price">Rp 3.500.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="smartphone">
                    <img src="img/category/samsung.png" alt="Samsung S24">
                    <h3>Samsung Galaxy S24</h3>
                    <p class="price">Rp 13.500.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="smartphone">
                    <img src="img/category/samsung.png" alt="Samsung S24">
                    <h3>Samsung Galaxy S24</h3>
                    <p class="price">Rp 13.500.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="smartphone">
                    <img src="img/category/samsung.png" alt="Samsung S24">
                    <h3>Samsung Galaxy S24</h3>
                    <p class="price">Rp 13.500.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="smartphone">
                    <img src="img/category/samsung.png" alt="Samsung S24">
                    <h3>Samsung Galaxy S24</h3>
                    <p class="price">Rp 13.500.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="smartphone">
                    <img src="img/category/samsung.png" alt="Samsung S24">
                    <h3>Samsung Galaxy S24</h3>
                    <p class="price">Rp 13.500.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="smartphone">
                    <img src="img/category/samsung.png" alt="Samsung S24">
                    <h3>Samsung Galaxy S24</h3>
                    <p class="price">Rp 13.500.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="smartphone">
                    <img src="img/category/samsung.png" alt="Samsung S24">
                    <h3>Samsung Galaxy S24</h3>
                    <p class="price">Rp 13.500.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="smartphone">
                    <img src="img/category/samsung.png" alt="Samsung S24">
                    <h3>Samsung Galaxy S24</h3>
                    <p class="price">Rp 13.500.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="smartphone">
                    <img src="img/category/samsung.png" alt="Samsung S24">
                    <h3>Samsung Galaxy S24</h3>
                    <p class="price">Rp 13.500.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="smartphone">
                    <img src="img/category/samsung.png" alt="Samsung S24">
                    <h3>Samsung Galaxy S24</h3>
                    <p class="price">Rp 13.500.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="smartphone">
                    <img src="img/category/samsung.png" alt="Samsung S24">
                    <h3>Samsung Galaxy S24</h3>
                    <p class="price">Rp 13.500.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="smartphone">
                    <img src="img/category/samsung.png" alt="Samsung S24">
                    <h3>Samsung Galaxy S24</h3>
                    <p class="price">Rp 13.500.000</p>
                    <button class="btn-detail">View Details</button>
                </div>

                <div class="product-card" data-category="smartphone">
                    <img src="img/category/samsung.png" alt="Samsung S24">
                    <h3>Samsung Galaxy S24</h3>
                    <p class="price">Rp 13.500.000</p>
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


    <script src="js/catalog.js"></script>
</body>

</html>
