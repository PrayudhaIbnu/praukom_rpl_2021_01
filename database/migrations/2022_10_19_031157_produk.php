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
        Schema::create('produk', function (Blueprint $table) {
            $table->engine = env('DB_STORAGE_ENGINE', 'InnoDB');
            $table->charset = env('DB_CHARSET', 'utf8mb4');
            $table->collation = env('DB_COLLATION', 'utf8mb4_general_ci');
            $table->string('id_produk', 15)->primary();
            $table->integer('kategori')->unsigned();
            $table->string('nama_produk', 100);
            $table->integer('stok')->nullable();
            $table->string('satuan_produk', 8);
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->text('foto')->nullable();
            $table->integer('user');
            $table->integer('terjual')->nullable();

            $table
                ->foreign('kategori')
                ->references('id_kategori')
                ->on('produk_kategori')
                ->cascadeOnDelete();

            $table
                ->foreign('user')
                ->references('id')
                ->on('user')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('produk');
    }
};
