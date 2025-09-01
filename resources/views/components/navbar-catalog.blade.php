<!-- Navigation -->
<nav class="navbar-section" id="navbar">
    <div class="nav-container">
        <!-- Logo -->
        <a href="/" class="logo">
            <img src="img/logo.webp" alt="Logo" style="height: 45px; margin-right: 20px; vertical-align: bottom" />
            Bismar<span>Catalog</span>
        </a>

        <!-- Search Box -->
        <form class="search-box">
            <input type="text" placeholder="Search in Catalog" />
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>

        <!-- Menu -->
        <ul class="nav-menu" id="nav-menu">
            <li>
                <a href="{{ route('home') }}?scroll=products" class="nav-link">Home</a>

            </li>
        </ul>
    </div>
</nav>
