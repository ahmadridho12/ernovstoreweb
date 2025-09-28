<?php

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
     * Accessor untuk URL foto slider
     */
    public function getFotoUrlAttribute()
    {
        return slider_image_url($this->foto);
    }

    /**
     * Scope untuk slider aktif
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
