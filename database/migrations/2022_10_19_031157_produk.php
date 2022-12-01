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
            $table->engine = 'innodb';
            $table->string('id_produk', 15)->primary();
            $table->integer('kategori')->unsigned();
            $table->string('nama_produk', 100);
            $table->integer('stok');
            $table->string('satuan_produk', 8);
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->text('foto')->nullable();
            $table->char('supplier', 5);
            $table->char('user', 5);

            $table
                ->foreign('supplier')
                ->references('id_supplier')
                ->on('supplier')
                ->cascadeOnDelete();

            $table
                ->foreign('kategori')
                ->references('id_kategori')
                ->on('produk_kategori')
                // ->cascadeOnDelete()
            ;

            $table
                ->foreign('user')
                ->references('id_user')
                ->on('users')
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
