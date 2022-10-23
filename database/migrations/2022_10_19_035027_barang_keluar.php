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
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->string('id_produk', 15);
            $table->integer('qty');
            $table->text('keterangan');

            $table
                ->foreign('id_produk')
                ->references('id_produk')
                ->on('produk')
                ->cascadeOnDelete();

            // $table
            //     ->foreign('laba')
            //     ->references('id_laba')
            //     ->on('laba')
            //     ->cascadeOnDelete();
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
        Schema::dropIfExists('barang_keluar');
    }
};
