<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login-page');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                $user = Auth::user();

                // OTP & expiry pakai Carbon langsung
                $user->two_factor_code = random_int(100000, 999999);
                $user->two_factor_expires_at = \Carbon\Carbon::now()->addMinutes(1);
                $user->save();

                // Kirim OTP via email
                Mail::send('emails.otp', [
                    'otp'  => $user->two_factor_code,
                    'name' => $user->name,
                ], function ($message) use ($user) {
                    $message->to($user->email)
                            ->subject('Kode OTP Login PT. Indo Bismar');
                });

                return redirect()->route('otp.form')
                 ->with('success', 'Kode OTP telah dikirim ke email Anda.');
            }

            Auth::logout();
            return back()->withErrors(['login' => 'Anda tidak punya akses admin.']);
        }

        return back()->withErrors(['login' => 'Email atau password tidak sesuai.']);
    }

    public function showOtpForm()
    {
        return view('verify-otp');
    }

    /*public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);

        $user = Auth::user();

        if (! $user) {
            return redirect('/login-page')->withErrors(['login' => 'Sesi tidak valid. Silakan login ulang.']);
        }

        // two_factor_expires_at otomatis jadi Carbon instance kalau di-cast di model
        if ($user->two_factor_code === $request->otp && $user->two_factor_expires_at?->isFuture()) {
            $user->two_factor_code = null;
            $user->two_factor_expires_at = null;
            $user->save();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['otp' => 'Kode OTP salah atau sudah kedaluwarsa.']);
    }*/

    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $user->two_factor_code = null;
            $user->two_factor_expires_at = null;
            $user->save();
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login-page');
    }
}
