<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Tentukan nama tabel
    protected $table = 'product';

    // Tentukan primary key
    protected $primaryKey = 'id_produk';

    // Field yang bisa diisi secara massal
    // Field yang bisa diisi secara massal
    protected $fillable = [
        'kategori_id', 'nama', 'harga', 'harga_diskon', 'status',
        'subjudul', 'deskripsi', 'berat', 'dimensi', 'material', 'color', 'size'
    ];

    /**
     * Relasi ke model ProductPhoto (satu produk memiliki banyak foto)
     */
    public function photos()
    {
        return $this->hasMany(ProductPhoto::class, 'product_id', 'id_produk');
    }
    public function kategori()
    {
        return $this->belongsTo(\App\Models\Categoris::class, 'kategori_id', 'id_category');
    }
    public function getRouteKeyName()
{
    return 'slug';
}


}
