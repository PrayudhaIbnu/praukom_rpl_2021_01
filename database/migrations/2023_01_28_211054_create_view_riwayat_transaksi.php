<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            "CREATE OR REPLACE VIEW riwayat_transaksi AS (
              SELECT faktur.id_faktur, penjualan.tanggal, penjualan.jam_jual, user.nama FROM ((faktur
              INNER JOIN penjualan ON faktur.penjualan = penjualan.id_penjualan)
              INNER JOIN user ON faktur.kasir = user.id)
            )"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_transaksi');
    }
};
