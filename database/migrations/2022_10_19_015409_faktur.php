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
        Schema::create('struk', function (Blueprint $table) {
            $table->engine = env('DB_STORAGE_ENGINE', 'InnoDB');
            $table->charset = env('DB_CHARSET', 'utf8mb4');
            $table->collation = env('DB_COLLATION', 'utf8mb4_general_ci');
            $table->char('id_struk', 13)->primary();
            $table->char('penjualan', 13);
            $table->integer('jml_tunai');
            $table->integer('jml_kembalian');
            $table->integer('grand_total');
            $table->integer('kasir');

            $table
                ->foreign('penjualan')
                ->references('id_penjualan')
                ->on('penjualan')
                ->cascadeOnDelete();

            $table
                ->foreign('kasir')
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
        Schema::dropIfExists('struk');
    }
};
