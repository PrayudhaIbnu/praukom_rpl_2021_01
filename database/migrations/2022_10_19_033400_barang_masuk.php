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
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->string('id_produk', 15);
            $table->date('tanggal_masuk');
            $table->date('tanggal_exp');
            $table->integer('qty');
            $table->char('supplier', 5);

            $table
                ->foreign('supplier')
                ->references('id_supplier')
                ->on('supplier')
                ->cascadeOnDelete();

            $table
                ->foreign('id_produk')
                ->references('id_produk')
                ->on('produk')
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
        Schema::dropIfExists('barang_masuk');
    }
};
