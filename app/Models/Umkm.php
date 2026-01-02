<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    // Menentukan nama tabel (opsional jika nama tabel sudah 'umkms')
    protected $table = 'umkms';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'user_id',
        'nama_toko',
        'alamat',
        'status_verifikasi',
        'is_open',
    ];

    /**
     * Relasi ke User (Satu UMKM dimiliki oleh satu User)
     * Ini memenuhi syarat minimal 2 relasi antar tabel.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
