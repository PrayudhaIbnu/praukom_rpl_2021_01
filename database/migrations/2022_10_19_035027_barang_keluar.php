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
            $table->engine = env('DB_STORAGE_ENGINE', 'InnoDB');
            $table->charset = env('DB_CHARSET', 'utf8mb4');
            $table->collation = env('DB_COLLATION', 'utf8mb4_general_ci');
            $table->string('produk', 15);
            $table->integer('qty');
            $table->date('tanggal_keluar');
            $table->text('keterangan');
            $table->integer('user');

            $table
                ->foreign('produk')
                ->references('id_produk')
                ->on('produk')
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
        Schema::dropIfExists('barang_keluar');
    }
};
