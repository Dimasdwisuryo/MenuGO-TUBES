<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_umkm',
        'status',
        'deskripsi',
        'no_telp',
        'alamat',
        'jam_buka',
        'jam_tutup',
        'status_verifikasi',
        'is_active'
    ];

    /**
     * Relasi balik ke User (Pemilik)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke banyak Menu (One-to-Many)
     */
    public function menus()
    {
        return $this->hasMany(Menu::class, 'umkm_id');
    }
}
