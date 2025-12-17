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

        <!-- Menu Navigasi -->
        <ul class="nav-menu" id="nav-menu">
            <!-- Dropdown Catalog -->
            <li class="dropdown">
                <a href="javascript:void(0);" class="nav-link" onclick="toggleDropdown()" aria-expanded="true">

                    <svg class="nav-icon" viewBox="0 0 24 24" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="7" />
                        <rect x="14" y="3" width="7" height="7" />
                        <rect x="3" y="14" width="7" height="7" />
                        <rect x="14" y="14" width="7" height="7" />
                    </svg>
                    Catalog
                </a>

                <ul class="dropdown-menu" id="dropdownMenu">
                    <li>
                        <a href="{{ route('catalog.show', ['type' => 'laptop']) }}"
                            class="{{ request('type') === 'laptop' ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M4 5h16v10H4z" />
                                <path d="M2 17h20" />
                            </svg>
                            Laptop & Notebook
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('catalog.show', ['type' => 'pc']) }}"
                            class="{{ request('type') === 'pc' ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M6 3h12v14H6z" />
                                <path d="M4 21h16" />
                            </svg>
                            Desktop Computer
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('catalog.show', ['type' => 'hp']) }}"
                            class="{{ request('type') === 'hp' ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <rect x="7" y="2" width="10" height="20" rx="2" />
                                <circle cx="12" cy="18" r="1" />
                            </svg>
                            Handphone
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('catalog.show', ['type' => 'accessories']) }}"
                            class="{{ request('type') === 'accessories' ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 2v4M12 18v4M2 12h4M18 12h4" />
                                <circle cx="12" cy="12" r="5" />
                            </svg>
                            IT Accessories
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Home -->
            <li>
                <a href="{{ route('home') }}?scroll=products" class="nav-link">
                    <svg class="nav-icon" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M3 10.5L12 3l9 7.5" />
                        <path d="M5 9.5V21h14V9.5" />
                    </svg>
                    Back to Home
                </a>
            </li>
        </ul>
    </div>
</nav>
