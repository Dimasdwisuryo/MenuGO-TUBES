<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'umkm_id',
        'category_id',
        'nama_menu',
        'harga',
        'gambar_menu',
        'deskripsi_menu', // Tambahkan ini
        'is_available'
    ];

    /**
     * Relasi balik ke UMKM
     */
    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
