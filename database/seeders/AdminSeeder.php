<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk membuat akun admin default.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@indobismar.com'], 
            [
                'name' => 'Admin Pendidikan',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'abilghlm@gmail.com'], 
            [
                'name' => 'Nabil Ghulam',
                'password' => Hash::make('nabil123'),
                'role' => 'admin',
            ]
        );
    }
}
