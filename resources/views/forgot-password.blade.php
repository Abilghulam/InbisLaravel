<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Lupa Password - PT. Indo Bismar</title>
    <link rel="stylesheet" href="{{ asset('css/password.css') }}">

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
    <div class="auth-section">
        <div class="auth-container">
            <div class="auth-card">
                <h2 class="auth-title">Lupa Password</h2>
                <p class="auth-subtitle">Masukkan Email untuk reset password</p>

                @if (session('success'))
                    <p class="auth-message success">{{ session('success') }}</p>
                @endif
                @if (session('error'))
                    <p class="auth-message error">{{ session('error') }}</p>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="auth-form">
                    @csrf
                    <div class="auth-group">
                        <input type="email" name="email" placeholder="Email Admin" required>
                    </div>
                    <button type="submit" class="auth-btn">Kirim Link Reset</button>
                </form>

                <div class="auth-footer">
                    © 2025 PT. Indo Bismar Group
                    <span>Keamanan Anda adalah prioritas kami</span>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
