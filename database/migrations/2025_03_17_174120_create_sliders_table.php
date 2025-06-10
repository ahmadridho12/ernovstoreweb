<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            // Menggunakan id_slider sebagai primary key
            $table->bigIncrements('id_slider');
            
            // Field nama slider
            $table->string('nama');
            
            // Field untuk menyimpan path atau nama file foto slider
            $table->string('foto');
            
            // Field status, misalnya 'active' atau 'inactive'
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            
            // Field judul slider
            $table->string('judul')->nullable();
            
            // Field deskripsi slider, menggunakan text karena kemungkinan lebih panjang
            $table->text('deskripsi')->nullable();
            
            // Field timestamps (created_at dan updated_at)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
