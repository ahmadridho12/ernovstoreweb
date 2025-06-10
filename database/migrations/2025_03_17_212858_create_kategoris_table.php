<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorisTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kategoris', function (Blueprint $table) {
            // Primary key dengan nama id_category
            $table->bigIncrements('id_category');
            
            // Field nama kategori
            $table->string('nama');
            
            // Field judul kategori
            $table->string('judul');
            
            // Field foto kategori (misalnya, menyimpan path file)
            $table->string('foto');
            
            // Timestamps: created_at dan updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('kategoris');
    }
}
