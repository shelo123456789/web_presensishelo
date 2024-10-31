<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Siswa;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);

        Siswa::create([
            'nama' => 'siswa',
            'password' => '123',
            'kelas' => '12',
            'jurusan' => 'Rpl',
            'tanggal' => '10-09-24',
            'datang' => 'ya',
            'pulang' => 'ya',
        ]);

        $this->call([
            UserSeeder::class, // Tambahkan UserSeeder di sini
        ]);
    }
}
