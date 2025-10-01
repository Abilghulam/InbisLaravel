<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Admin Panel' }}</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

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
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Logo Branding -->
        <div class="admin-logo">
            <img src="{{ asset('img/logo.png') }}" alt="IndoBismar" class="logo-img">
            <span class="logo-text"><span style="color:black">Bismar</span>Admin</span>
        </div>

        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.home.index') }}">Kelola Home</a>
        <a href="{{ route('admin.catalog.index') }}">Kelola Catalog</a>
        <form action="{{ route('logout') }}" method="POST" style="margin-top:10px;">
            @csrf
            <button type="submit">
                Logout
            </button>
        </form>
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

        <!-- Konten halaman -->
        @yield('content')

        <!-- Stacks -->
        @stack('scripts')
    </div>
</body>

</html>
