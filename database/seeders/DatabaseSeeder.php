<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Umkm;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Membuat Akun Admin MenuGO
        User::create([
            'name' => 'Admin MenuGO',
            'email' => 'admin@menugo.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin_menugo',
        ]);

        // 2. Membuat Akun Owner (Contoh untuk Demo)
        $owner = User::create([
            'name' => 'Mbak Kaira',
            'email' => 'owner@kaira.com',
            'password' => Hash::make('owner123'),
            'role' => 'owner',
        ]);

        // 3. Membuat Data UMKM Otomatis untuk Owner tersebut
        Umkm::create([
            'user_id' => $owner->id,
            'nama_toko' => 'Warung Kaira Ketintang',
            'alamat' => 'Jl. Ketintang No. 156, Surabaya',
            'status_verifikasi' => 'approved',
            'is_open' => true,
        ]);

        // Tambahkan user testing tambahan jika perlu
        User::factory(3)->create([
            'role' => 'owner'
        ]);
    }
}
