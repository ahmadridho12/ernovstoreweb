<?php

// app/Models/Categoris.php
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
     * Accessor untuk URL foto kategori - kompatibel lokal & shared hosting
     */
    public function getFotoUrlAttribute()
    {
        if (empty($this->foto)) {
            return asset('images/default-category.jpg');
        }

        if (file_exists(public_path('storage'))) {
            return asset('storage/photos/' . basename($this->foto));
        }

        return url('/storage/photos/' . basename($this->foto));
    }

    /**
     * Scope untuk kategori aktif
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
