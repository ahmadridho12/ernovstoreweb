<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            // Primary key
            $table->bigIncrements('id_produk');

            // Foreign key: kategori_id mengacu ke tabel kategoris.id_category
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')
                  ->references('id_category')
                  ->on('kategoris')
                  ->onDelete('cascade');

            // Kolom data produk
            $table->string('nama');
            $table->decimal('harga', 10, 2);
            $table->decimal('harga_diskon', 10, 2)->nullable(); // Harga diskon, bisa null
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status produk

            $table->string('subjudul')->nullable();
            $table->text('deskripsi')->nullable();
            $table->float('berat')->nullable();
            $table->string('dimensi')->nullable();
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
