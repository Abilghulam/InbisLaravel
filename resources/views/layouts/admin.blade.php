<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard Admin' }}</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

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

    <!-- Font Awesome (untuk ikon dropdown) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Logo Branding -->
        <div class="admin-logo">
            <img src="{{ asset('img/logo.png') }}" alt="IndoBismar" class="logo-img">
            <span class="logo-text"><span style="color:black">Bismar</span>Admin</span>
        </div>

        <!-- Navigasi Utama -->
        <a href="{{ route('admin.dashboard') }}"
            class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">Dashboard</a>

        <a href="{{ route('admin.home.index') }}" class="{{ Route::is('admin.home*') ? 'active' : '' }}">Kelola Home</a>

        <a href="{{ route('admin.product.index') }}" class="{{ Route::is('admin.product*') ? 'active' : '' }}">Kelola
            Product</a>

        <a href="{{ route('admin.catalog.index') }}" class="{{ Route::is('admin.catalog*') ? 'active' : '' }}">Kelola
            Catalog</a>

        <!-- Profil Admin di Sidebar Bawah -->
        <div class="admin-profile">
            <div class="profile-info" id="profileToggle">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin Indo Bismar') }}&background=dc3545&color=fff"
                    alt="Admin" class="profile-pic">
                <div class="profile-text">
                    <h4>{{ Auth::user()->name ?? 'Admin Indo Bismar' }}</h4>
                    <small>{{ Auth::user()->role ?? 'Administrator' }}</small>
                </div>
            </div>

            <ul class="profile-menu" id="profileMenu">
                <li class="email-item">
                    <svg class="w-5 h-5 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2"
                            d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span>{{ Auth::user()->email ?? 'admin@example.com' }}</span>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="background: #f8f9fa;">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <svg class="w-5 h-5 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <!-- 🔔 Alert Global -->
        @if ($errors->any())
            <div
                style="background:#f8d7da; color:#842029; padding:12px; border:1px solid #f5c2c7; margin-bottom:20px; border-radius:5px;">
                <strong>Terjadi kesalahan:</strong>
                <ul style="margin:10px 0 0 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="alert-dismissible alert-success" id="flash-message">
                {{ session('success') }}
                <button type="button" class="close-btn" onclick="this.parentElement.style.display='none'">×</button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert-dismissible alert-danger" id="flash-message">
                {{ session('error') }}
                <button type="button" class="close-btn" onclick="this.parentElement.style.display='none'">×</button>
            </div>
        @endif

        @php
            use Illuminate\Support\Str;

            $segments = request()->segments();
            $breadcrumbs = [];

            // Label dasar
            $replacements = [
                'admin' => 'Dashboard',
                'dashboard' => 'Dashboard',
                'home' => 'Home',
                'product' => 'Product',
                'products' => 'Product',
                'catalog' => 'Catalog',
                'create' => 'Tambah',
                'edit' => 'Edit',
                'show' => 'Detail',
            ];

            // Label kategori rapi
            $categoryLabels = [
                'laptop' => 'Laptop & Notebook',
                'hp' => 'Handphone',
                'pc' => 'Dekstop Computer',
                'accessories' => 'Accessories',
            ];

            // Kalau cuma /admin → tampil Dashboard saja
            if (
                (count($segments) === 1 && $segments[0] === 'admin') ||
                (count($segments) === 2 && $segments[0] === 'admin' && $segments[1] === 'dashboard')
            ) {
                $breadcrumbs[] = ['label' => 'Dashboard'];
            } else {
                // Dashboard selalu link
                $breadcrumbs[] = ['label' => 'Dashboard', 'url' => url('/admin/dashboard')];

                // Jika URL mengandung 'product'
                if (in_array('product', $segments)) {
                    $breadcrumbs[] = ['label' => 'Product', 'url' => url('/admin/product')];

                    // Ambil kategori dari segmen setelah 'product'
                    $productIndex = array_search('product', $segments);
                    $categorySlug = $segments[$productIndex + 1] ?? null;

                    if ($categorySlug && !in_array($categorySlug, ['create', 'edit']) && !is_numeric($categorySlug)) {
                        $slug = strtolower($categorySlug);
                        $category = $categoryLabels[$slug] ?? Str::title($slug);

                        $breadcrumbs[] = [
                            'label' => $category,
                            'url' => url("/admin/product/{$slug}"),
                        ];
                    }

                    // Tambah Edit / Create jika ada
                    if (in_array('create', $segments)) {
                        $breadcrumbs[] = ['label' => 'Tambah'];
                    } elseif (in_array('edit', $segments)) {
                        $breadcrumbs[] = ['label' => 'Edit'];
                    }
                } else {
                    // ==== DEFAULT untuk halaman lain ====
                    foreach ($segments as $index => $segment) {
                        if ($segment === 'admin' || $segment === 'dashboard') {
                            continue;
                        }
                        if (is_numeric($segment)) {
                            continue;
                        }

                        $label = $replacements[$segment] ?? Str::title(str_replace(['-', '_'], ' ', $segment));
                        $url = url(implode('/', array_slice($segments, 0, $index + 1)));

                        if ($index !== array_key_last($segments)) {
                            $breadcrumbs[] = ['label' => $label, 'url' => $url];
                        } else {
                            $breadcrumbs[] = ['label' => $label];
                        }
                    }
                }
            }
        @endphp

        <x-breadcrump-admin :items="$breadcrumbs" />

        <!-- Konten halaman -->
        @yield('content')

        <!-- Stacks -->
        @stack('scripts')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const profileInfo = document.getElementById('profileToggle');
            const profileMenu = document.getElementById('profileMenu');

            profileInfo.addEventListener('click', () => {
                profileMenu.classList.toggle('show');
            });

            // Klik di luar untuk menutup
            document.addEventListener('click', (e) => {
                if (!profileInfo.contains(e.target) && !profileMenu.contains(e.target)) {
                    profileMenu.classList.remove('show');
                }
            });
        });
    </script>

</body>

</html>
