<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    // Tabel default adalah 'product_photos', jadi tidak perlu diubah jika sudah sesuai.
    
    // Field yang bisa diisi secara massal
    protected $fillable = ['product_id', 'foto'];

    /**
     * Relasi ke model Product (satu foto milik satu produk)
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id_produk');
    }
}
