<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kode OTP - Indo Bismar Group</title>

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

<body
    style="font-family: 'Montserrat', 'Nunito Sans', Arial, sans-serif; line-height:1.6; background-color:#f4f4f4; padding:20px;">

    <table width="100%" cellpadding="0" cellspacing="0"
        style="max-width:600px;margin:auto;background:#fff;border:1px solid #e5e7eb;border-radius:12px;overflow:hidden;box-shadow:0 4px 14px rgba(0,0,0,0.08);">

        <!-- Header -->
        <tr>
            <td style="padding:30px 20px;text-align:center;background:#ac0000;color:#fff;">
                <img src="https://bismareducation.com/img/logo/logo1.png" alt="Logo PT. Indo Bismar"
                    style="width:85px;height:auto;padding:12px;background:#fff;border-radius:50%;display:block;margin:0 auto 12px;">
                <h2 style="margin:0;font-size:22px;font-weight:700;letter-spacing:0.5px;">PT. Indo Bismar Group</h2>
                <p style="margin:6px 0 0;font-size:14px;color:#ffecec;font-style:italic;">Distributor dan Retail
                    Komputer Terpercaya</p>
            </td>
        </tr>

        <!-- Body -->
        <tr>
            <td style="padding:35px;">
                <h3 style="font-size:20px;color:#111;margin:0 0 18px;">🔑 Kode OTP Login</h3>

                <p style="font-size:15px; color:#444; margin:0 0 18px;">
                    Halo, {{ $name }}
                </p>

                <p style="font-size:15px; color:#444; margin:0 0 18px;">
                    Berikut adalah <strong style="color:#ac0000;">kode OTP untuk login ke dashboard admin</strong>.
                    Demi keamanan, kode ini hanya berlaku selama <strong>5 menit</strong>.
                </p>

                <p style="text-align:center; margin:35px 0;">
                    <span
                        style="display:inline-block;font-size:28px;font-weight:bold;color:#111;background:#f3f4f6;padding:16px 30px;border-radius:10px;letter-spacing:6px;box-shadow:0 4px 10px rgba(0,0,0,0.08);">
                        {{ $otp }}
                    </span>
                </p>

                <p style="font-size:14px; color:#555; margin:0 0 20px;">
                    Jangan pernah bagikan kode ini kepada siapa pun. Tim kami tidak akan pernah meminta kode OTP Anda.
                </p>

                <p style="font-size:15px; color:#111; margin:0;">
                    Salam hangat,<br>
                    <strong style="color:#ac0000;">Tim Administrator PT. Indo Bismar Group</strong>
                </p>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td
                style="background:#f9f9f9;padding:18px;text-align:center;font-size:12px;color:#777;border-top:1px solid #eee;">
                © 2025 PT. Indo Bismar Group <br>
                <span style="font-style:italic;color:#555;">Keamanan data Anda adalah prioritas utama kami</span>
            </td>
        </tr>
    </table>

</body>

</html>
