<?php

// app/Models/Product.php
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

    /**
     * Relasi ke model ProductPhoto
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

    /**
     * Accessor untuk URL gambar utama - kompatibel lokal & shared hosting
     */
    public function getMainImageUrlAttribute()
    {
        // 1. Cek apakah ada relasi photos
        if ($this->photos && $this->photos->isNotEmpty()) {
            $photoUrl = $this->photos->first()->url;

            if (file_exists(public_path('storage'))) {
                return asset('storage/products/' . basename($photoUrl));
            }
            return url('/storage/products/' . basename($photoUrl));
        }

        // 2. Kalau nggak ada photos, cek field foto di tabel products
        if (isset($this->foto) && $this->foto) {
            if (file_exists(public_path('storage'))) {
                return asset('storage/products/' . basename($this->foto));
            }
            return url('/storage/products/' . basename($this->foto));
        }

        // 3. Default image
        return asset('images/default-product.jpg');
    }

    /**
     * Accessor untuk URL gambar - alias dari main_image_url
     */
    public function getImageUrlAttribute()
    {
        return $this->main_image_url;
    }

    /**
     * Get all photo URLs untuk gallery
     */
    public function getPhotoUrlsAttribute()
    {
        if ($this->photos && $this->photos->isNotEmpty()) {
            return $this->photos->map(function ($photo) {
                if (file_exists(public_path('storage'))) {
                    return asset('storage/products/' . basename($photo->url));
                }
                return url('/storage/products/' . basename($photo->url));
            });
        }

        return collect([$this->main_image_url]);
    }
}
