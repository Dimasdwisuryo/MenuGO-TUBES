<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::insert([
        ['nama_kategori' => 'Makanan'],
        ['nama_kategori' => 'Minuman'],
        ['nama_kategori' => 'Snack'],
    ]);
    }
}
