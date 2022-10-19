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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->integer('id_penjualan')->primary();
            $table->date('tanggal')->default(now());
            $table->time('jam_jual')->default(now());
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('penjualan');
    }
};
