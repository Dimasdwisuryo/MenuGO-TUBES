<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Umkm;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Menjalankan CategorySeeder untuk mengisi tabel categories
        $this->call(CategorySeeder::class);

        // 2. Membuat Akun Admin MenuGO
        User::create([
            'name' => 'Admin MenuGO',
            'email' => 'admin@menugo.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin_menugo',
        ]);

        // 3. Membuat Akun Owner (Contoh untuk Demo)
        $owner = User::create([
            'name' => 'Bapak Joni',
            'email' => 'owner@bakso.com',
            'password' => Hash::make('owner123'),
            'role' => 'owner',
        ]);

        // 4. Membuat Data UMKM Otomatis untuk Owner tersebut
        Umkm::create([
            'user_id' => $owner->id,
            'nama_umkm' => 'Warung Bakso Pak Joni',
            'deskripsi' => 'Bakso urat asli Wonogiri sejak 1990',
            'no_telp' => '081332186046',
            'alamat' => 'Jl. Ketintang No.208, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231',
            'jam_buka' => '10:00:00',
            'jam_tutup' => '19:30:00',
            'status_verifikasi' => 'approved',
            'is_active' => true,
        ]);
    }
}
