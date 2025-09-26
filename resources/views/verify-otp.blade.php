<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication - Indo Bismar Group</title>

    <link rel="stylesheet" href="{{ asset('css/verify-otp.css') }}">

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
    <div class="container">
        <div class="card">
            <h2 class="title">
                {{ $title ?? 'Verifikasi OTP' }}
            </h2>

            {{-- Alert sukses / error --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <div class="icon">
                <img src="{{ asset('img/lock.webp') }}" alt="OTP Lock" style="width:60px; margin-bottom:15px;">
            </div>

            <div class="timer">
                Kode OTP berlaku selama <span id="countdown">01:00</span>
            </div>

            {{-- Form Verifikasi OTP --}}
            <form method="POST" action="{{ route('otp.verify') }}" class="form">
                @csrf

                <div class="form-group">
                    <label for="otp">Masukkan Kode OTP</label>
                    <input type="text" id="otp" name="otp" maxlength="6"
                        class="@error('otp') input-error @enderror" placeholder="6 digit kode" required>
                    @error('otp')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-primary">
                    Verifikasi OTP
                </button>
            </form>

            {{-- Tombol Kirim Ulang --}}
            <form method="POST" action="{{ route('otp.resend') }}" class="resend-form">
                @csrf
                <button type="submit" class="btn-link">
                    Kirim ulang kode OTP
                </button>
            </form>
        </div>
    </div>

    <script>
        let duration = 1 * 60; // 5 menit
        const display = document.getElementById("countdown");

        const timer = setInterval(() => {
            let minutes = Math.floor(duration / 60);
            let seconds = duration % 60;
            display.textContent =
                (minutes < 10 ? "0" : "") + minutes + ":" +
                (seconds < 10 ? "0" : "") + seconds;

            if (--duration < 0) {
                clearInterval(timer);
                display.textContent = "Waktu habis!";
            }
        }, 1000);
    </script>


</body>

</html>
