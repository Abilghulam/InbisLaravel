<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan sudah login dan role admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Jika belum login atau bukan admin
        return redirect()->route('login.page')->withErrors([
            'email' => 'Akses ditolak, hanya admin yang bisa masuk.'
        ]);
    }
}
