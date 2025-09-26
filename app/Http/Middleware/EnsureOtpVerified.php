<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureOtpVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Kalau user login tapi belum verifikasi OTP
        if ($user && $user->two_factor_code !== null) {
            return redirect()->route('otp.form')
                ->withErrors(['otp' => 'Silakan verifikasi OTP terlebih dahulu.']);
        }

        return $next($request);
    }
}
