<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Reset Password - PT. Indo Bismar</title>
</head>

<body style="font-family: Arial, sans-serif; line-height:1.6; background-color:#f4f4f4; padding:20px;">

    <table width="100%" cellpadding="0" cellspacing="0"
        style="max-width:600px;margin:auto;background:#fff;border:1px solid #ddd;border-radius:6px;">
        <tr>
            <td style="padding:20px;text-align:center;background:#dc2626;color:#fff;border-radius:6px 6px 0 0;">
                <h2 style="margin:0;">PT. Indo Bismar</h2>
            </td>
        </tr>
        <tr>
            <td style="padding:20px;">
                <p>Halo,</p>
                <p>Kami menerima permintaan reset password untuk akun Anda. Klik tombol di bawah untuk melanjutkan:</p>

                <p style="text-align:center; margin:30px 0;">
                    <a href="{{ $url }}"
                        style="background:#dc2626;color:#fff;padding:12px 24px;text-decoration:none;border-radius:4px;display:inline-block;">
                        Reset Password
                    </a>
                </p>

                <p>Atau buka link ini di browser Anda:</p>
                <p><a href="{{ $url }}">{{ $url }}</a></p>

                <p>Jika Anda tidak meminta reset password, abaikan email ini.</p>
                <p>Terima kasih,<br><strong>Tim PT. Indo Bismar</strong></p>
            </td>
        </tr>
    </table>

</body>

</html>
