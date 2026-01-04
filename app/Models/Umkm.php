<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = ['user_id', 'nama_usaha', 'alamat_lengkap', 'foto_toko'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function menus() {
        return $this->hasMany(Menu::class);
    }
}
