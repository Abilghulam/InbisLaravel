<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    // Form lupa password
    public function showForgotForm()
    {
        return view('forgot-password');
    }

    // Kirim email reset password
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        if (! $user) {
            return back()->with('error', 'Email tidak ditemukan.');
        }

        // Buat token
        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        // Buat link reset
        $resetLink = url('/reset-password/' . $token);

        // Kirim email dengan template
        Mail::send('emails.reset-password', [
            'url'  => $resetLink,
            'user' => $user   
        ], function ($message) use ($request) {
            $message->to($request->email)->subject('Reset Password - Indo Bismar Group');
        });

        return back()->with('success', 'Berhasil verifikasi, silahkan cek Email Anda.');
    }

    // Tampilkan form reset password
    public function showResetForm($token)
    {
        return view('reset-password', ['token' => $token]);
    }

    // Update password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required'
        ]);

        $record = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (! $record) {
            return back()->with('error', 'Token reset tidak valid.');
        }

        // Update password user
        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);

        // Hapus token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login.page')->with('success', 'Password berhasil direset. Silakan login.');
    }
}
