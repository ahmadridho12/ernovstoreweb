<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $fillable = ['product_id', 'foto'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id_produk');
    }

    /**
     * Accessor URL foto produk
     */
    public function getFotoUrlAttribute()
    {
        return product_image_url($this->foto);
    }
}
