<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;  // Pastikan Anda mengimpor model User
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat pengguna pertama
        User::create([
            'name' => 'Admin',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('123'), // Hash password
            'role' => 'admin',
        ]);
    
        // Membuat pengguna kedua
        User::create([
            'name' => 'hilmalaya',
            'email' => 'hilatiinnaf@gmail.com',
            'password' => Hash::make('siswa123'), // Hash password
            'role' => 'siswa',
        ]);
    }
    
}
