<?php

namespace App\Models;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleColor extends Model
{
    use HasFactory;
    protected $table = 'sample_colors';
    protected $primaryKey = 'id_sample_color';
    protected $fillable = ['kode_sample', 'status'];

      protected $casts = [
        'status' => Status::class,
    ];
}
