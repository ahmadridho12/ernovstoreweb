<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('nama');
        });
    
        // Isi slug untuk data lama
        $products = DB::table('product')->get();
        foreach ($products as $product) {
            $slug = Str::slug($product->nama) . '-' . $product->id_produk;
            DB::table('product')->where('id_produk', $product->id_produk)->update(['slug' => $slug]);
        }
    
        // Setelah semua terisi, baru pasang unique
        Schema::table('product', function (Blueprint $table) {
            $table->unique('slug');
        });
    }
    
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
    
};
