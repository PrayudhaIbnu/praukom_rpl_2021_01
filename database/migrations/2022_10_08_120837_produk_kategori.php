<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        {
            Schema::create('produk_kategori', function (Blueprint $table) {
                $table->engine = 'innodb';
                $table->char('id_kategori', 2)->primary();
                $table->string('kategori_produk', 20);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        {
            Schema::dropIfExists('produk_kategori');
        }
    }
};
