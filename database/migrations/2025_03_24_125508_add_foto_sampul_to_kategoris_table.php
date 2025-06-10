<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('kategoris', function (Blueprint $table) {
        $table->string('foto_sampul', 255)->after('foto')->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('kategoris', function (Blueprint $table) {
        $table->dropColumn('foto_sampul');
    });
}

};
