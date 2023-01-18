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
                $table->engine = env('DB_STORAGE_ENGINE', 'InnoDB');
                $table->charset = env('DB_CHARSET', 'utf8mb4');
                $table->collation = env('DB_COLLATION', 'utf8mb4_general_ci');
                $table->engine = 'innodb';
                $table->increments('id_kategori');
                $table->string('kategori_produk', 20)->unique();
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
