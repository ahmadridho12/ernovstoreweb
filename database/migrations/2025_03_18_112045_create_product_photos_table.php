<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPhotosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('product_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Foreign key mengacu ke produk
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                  ->references('id_produk')
                  ->on('product')
                  ->onDelete('cascade');

            // Kolom untuk menyimpan foto produk
            $table->string('foto');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('product_photos');
    }
}
