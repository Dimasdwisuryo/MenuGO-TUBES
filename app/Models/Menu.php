<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['umkm_id', 'category_id', 'nama_item', 'harga', 'foto_item'];

    public function umkm() {
        return $this->belongsTo(Umkm::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
