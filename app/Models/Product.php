<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id_produk';
    protected $fillable = [
        'kategori_id', 'nama', 'harga', 'harga_diskon', 'status',
        'subjudul', 'deskripsi', 'berat', 'dimensi', 'material',
        'color', 'size', 'slug'
    ];

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

    /**
     * Ambil foto utama (thumbnail)
     */
    public function getThumbnailUrlAttribute()
    {
        if ($this->photos->isNotEmpty()) {
            return product_image_url($this->photos->first()->foto);
        }
        return asset('images/default-product.jpg');
    }

    /**
     * Alias untuk kompatibilitas
     */
    public function getMainImageUrlAttribute()
    {
        return $this->thumbnail_url;
    }

    /**
     * Semua foto untuk gallery
     */
    public function getPhotoUrlsAttribute()
    {
        if ($this->photos->isNotEmpty()) {
            return $this->photos->map(fn ($photo) => product_image_url($photo->foto));
        }
        return collect([asset('images/default-product.jpg')]);
    }
}
