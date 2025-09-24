<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

/**
 * App\Models\User
 *
 * @property string|null $two_factor_code
 * @property Carbon|null $two_factor_expires_at
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Kolom yang bisa diisi mass assignment.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'two_factor_code',
        'two_factor_expires_at',
    ];

    /**
     * Kolom yang harus disembunyikan saat serialisasi.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_code',
    ];

    /**
     * Casting kolom agar otomatis jadi tipe data tertentu.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at'     => 'datetime',
            'password'              => 'hashed',
            'two_factor_expires_at' => 'datetime',
        ];
    }

    /**
     * Cek apakah OTP masih valid.
     */
    public function hasValidOtp(?string $otp = null): bool
    {
        return $this->two_factor_code
            && $this->two_factor_expires_at instanceof Carbon
            && $this->two_factor_expires_at->isFuture()
            && ($otp === null || $this->two_factor_code === $otp);
    }

    /**
     * Reset OTP setelah berhasil login.
     */
    public function resetTwoFactorCode(): void
    {
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }
}
