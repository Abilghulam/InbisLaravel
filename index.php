<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Custom Maintenance Mode Check
|--------------------------------------------------------------------------
| Jika file maintenance.php ada di storage/framework (Laravel 10–11),
| kita tampilkan halaman maintenance custom tanpa melanjutkan bootstrap.
|
*/

$maintenanceFile = __DIR__ . '/storage/framework/maintenance.php';

if (file_exists($maintenanceFile)) {
    http_response_code(503);

    echo '
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Maintenance - Indo Bismar Group</title>

        <!-- Google Font Poppins -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                margin: 0;
                font-family: "Poppins", sans-serif;
                background: #fafafa;
                color: #333;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .container {
                background: #fff;
                width: 90%;
                max-width: 750px;
                padding: 40px;
                border-radius: 16px;
                text-align: center;
                box-shadow: 0 8px 20px rgba(0,0,0,0.08);
                border-top: 6px solid #d40000;
            }

            .logo {
                width: 120px;
                margin-bottom: 20px;
            }

            h1 {
                font-size: 28px;
                font-weight: 700;
                margin-bottom: 10px;
                color: #d40000;
            }

            p {
                font-size: 16px;
                line-height: 1.6;
                color: #555;
                margin-bottom: 25px;
            }

            .loader {
                border: 4px solid #eee;
                border-top: 4px solid #d40000;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                margin: 0 auto;
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            .footer {
                margin-top: 25px;
                font-size: 13px;
                color: #777;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <img src="../img/logo.png" class="logo" alt="Indo Bismar Logo">

            <h1>Website Under Maintenance!</h1>

            <p>
                Mohon maaf, kami sedang melakukan pemeliharaan sistem untuk meningkatkan
                kualitas layanan. Silakan kembali beberapa saat lagi.
            </p>

            <div class="loader"></div>

            <div class="footer">
                Indo Bismar Group &copy; '.date("Y").'
            </div>
        </div>
    </body>
    </html>
    ';

    exit;
}


/*
|--------------------------------------------------------------------------
| Laravel Default: Load Composer Autoloader
|--------------------------------------------------------------------------
*/

require __DIR__.'/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Bootstrap Laravel and Handle Request
|--------------------------------------------------------------------------
*/

$app = require_once __DIR__.'/bootstrap/app.php';

$app->handleRequest(Request::capture());
