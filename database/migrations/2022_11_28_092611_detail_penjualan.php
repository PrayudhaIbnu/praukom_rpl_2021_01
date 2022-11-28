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
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->string('produk', 15);
            $table->char('penjualan', 13);
            $table->integer('qty');
            $table->integer('sub_total_hrg');

            $table
                ->foreign('penjualan')
                ->references('id_penjualan')
                ->on('penjualan')
                ->cascadeOnDelete();

            $table
                ->foreign('produk')
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
    }
};
