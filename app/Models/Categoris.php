<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoris extends Model
{
    protected $table = 'kategoris';
    protected $primaryKey = 'id_category';

    protected $fillable = [
        'nama', 'judul', 'foto', 'status', 'deskripsi'
    ];

    /**
     * Relasi ke products
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'kategori_id', 'id_category');
    }

    /**
     * Accessor untuk URL foto kategori
     * (otomatis handle lokal & hosting pakai helper)
     */
    public function getFotoUrlAttribute()
    {
        return category_image_url($this->foto);
    }

    /**
     * Scope untuk kategori aktif
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
