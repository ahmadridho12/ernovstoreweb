<?php

// app/Models/Slider.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';
    protected $primaryKey = 'id_slider';
    protected $fillable = [
        'id_slider', 'judul', 'nama', 'foto', 'status',
        'deskripsi', 'created_at', 'updated_at'
    ];

    /**
     * Accessor untuk URL foto slider - kompatibel lokal & shared hosting
     */
    public function getFotoUrlAttribute()
    {
        if (empty($this->foto)) {
            return asset('images/no-slider.jpg');
        }

        // Direct implementation tanpa helper untuk menghindari masalah cache
        if (file_exists(public_path('storage'))) {
            return asset('storage/photos/' . basename($this->foto));
        }

        return url('/storage/photos/' . basename($this->foto));
    }

    /**
     * Scope untuk slider aktif
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
