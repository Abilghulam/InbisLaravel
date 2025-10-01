@props(['type'])
<!-- Navigation -->
<nav class="navbar-section" id="navbar">
    <div class="nav-container">
        <!-- Logo -->
        <a href="/" class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo"
                style="height: 45px; margin-right: 20px; vertical-align: bottom" />
            Bismar<span>Catalog</span>
        </a>

        <!-- Search Box -->
        <form action="{{ route('catalog.search', $type) }}" method="GET" class="search-box" id="searchForm">
            <input type="text" name="q" id="searchInput" placeholder="Search in {{ ucfirst($type) }} Catalog"
                value="{{ request('q') }}" />

            {{-- Tombol Clear --}}
            <button type="button" id="clearSearch" class="clear-btn">
                <i class="fas fa-times"></i>
            </button>

            {{-- Tombol Search --}}
            <button type="submit" class="search-btn">
                <i class="fas fa-search"></i>
            </button>
        </form>

        <!-- Tombol Hamburger (muncul di mobile) -->
        <button class="hamburger" id="hamburger-btn" aria-label="Toggle menu">
            ☰
        </button>

        <!-- Menu -->
        <ul class="nav-menu" id="nav-menu">
            <li>
                <a href="{{ route('home') }}?scroll=products" class="nav-link">Home</a>
            </li>

            <!-- Dropdown Catalog -->
            <li class="dropdown">
                <a href="javascript:void(0);" class="nav-link" onclick="toggleDropdown()" aria-expanded="false">
                    Catalog
                    <svg class="w-[12px] h-[12px] text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg"
                        width="18" height="18" fill="none" viewBox="0 0 24 24" style="margin-left: 5px">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </a>
                <ul class="dropdown-menu" id="dropdownMenu">
                    <li><a href="{{ route('catalog.show', ['type' => 'laptop']) }}">Laptop & Notebook</a></li>
                    <li><a href="{{ route('catalog.show', ['type' => 'pc']) }}">Dekstop Computer</a></li>
                    <li><a href="{{ route('catalog.show', ['type' => 'hp']) }}">Handphone</a></li>
                    <li><a href="{{ route('catalog.show', ['type' => 'accessories']) }}"> IT Accessories</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
