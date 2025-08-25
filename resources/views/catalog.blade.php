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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
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
    <section class="hero">
        <div class="hero-slider">
            <div class="slide"><img src="img/poster/poster1.jpg" alt="Promo 1"></div>
            <div class="slide"><img src="img/poster/poster2.jpg" alt="Promo 2"></div>
            <div class="slide"><img src="img/poster/poster3.jpg" alt="Promo 3"></div>
            <div class="slide"><img src="img/poster/poster4.jpg" alt="Promo 4"></div>
            <div class="slide"><img src="img/poster/poster5.jpg" alt="Promo 5"></div>
            <div class="slide"><img src="img/poster/poster6.jpg" alt="Promo 6"></div>
            <div class="slide"><img src="img/poster/poster7.jpg" alt="Promo 7"></div>
            <div class="slide"><img src="img/poster/poster8.jpg" alt="Promo 8"></div>
            <div class="slide"><img src="img/poster/poster9.jpg" alt="Promo 9"></div>
            <div class="slide"><img src="img/poster/poster10.jpg" alt="Promo 10"></div>
            <div class="slide"><img src="img/poster/poster11.jpg" alt="Promo 11"></div>
            <div class="slide"><img src="img/poster/poster14.jpg" alt="Promo 14"></div>
        </div>

        <!-- Navigation -->
        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>

        <!-- Dots -->
        <div class="dots"></div>
    </section>

    <!-- Breadcrumb -->
    <nav class="breadcrumb-card">
        <a href="/">Home</a>
        <span class="separator">›</span>
        <a href="/catalog">Catalog</a>
        <span class="separator">›</span>
        <span class="current">Semua Produk</span>
    </nav>

    <!-- Categories Section -->
    <section class="brands">
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
        </div>
    </section>

    <script src="js/catalog.js"></script>
</body>

</html>
