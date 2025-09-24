<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class OtpController extends Controller
{
    /**
     * Tampilkan form verifikasi OTP.
     */
    public function showVerifyForm()
    {
        return view('verify-otp', [
            'title' => 'Verifikasi OTP',
        ]);
    }

    /**
     * Proses verifikasi OTP.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $user = Auth::user();

        if (! $user) {
            return redirect()->route('login.page')
                ->with('error', 'Sesi tidak valid. Silakan login ulang.');
        }

        // Gunakan helper dari User model
        if ($user->hasValidOtp($request->otp)) {
            $user->resetTwoFactorCode();
            return redirect()->route('admin.dashboard')
                ->with('success', 'Login berhasil, selamat datang!');
        }

        return back()->with('error', 'Kode OTP salah atau sudah kadaluarsa.');
    }

    /**
     * Kirim ulang kode OTP.
     */
    public function resend()
    {
        $user = Auth::user();

        if (! $user) {
            return redirect()->route('login.page')
                ->with('error', 'Sesi tidak valid. Silakan login ulang.');
        }

        $user->two_factor_code = random_int(100000, 999999);
        $user->two_factor_expires_at = Carbon::now()->addMinutes(5);
        $user->save();

        // Kirim OTP via email
        Mail::raw("Kode OTP Login Anda adalah: {$user->two_factor_code}", function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Kode OTP Login');
        });

        return back()->with('success', 'Kode OTP baru sudah dikirim ke email Anda.');
    }
}
