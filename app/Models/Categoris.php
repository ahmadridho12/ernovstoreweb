<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoris extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $primaryKey = 'id_category';
    protected $fillable = [
        'nama',
        'judul',
        'foto',
        'foto_sampul' ,
    ];


    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'kategori_id', 'id_category');
    }
}
