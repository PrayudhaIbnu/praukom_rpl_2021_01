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
              SELECT struk.id_struk, penjualan.tanggal, penjualan.jam_jual, user.nama FROM ((struk
              INNER JOIN penjualan ON struk.penjualan = penjualan.id_penjualan)
              INNER JOIN user ON struk.kasir = user.id)
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
