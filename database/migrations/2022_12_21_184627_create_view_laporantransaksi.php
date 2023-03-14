<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            "CREATE OR REPLACE VIEW laporan_transaksi AS (
              SELECT penjualan.tanggal, penjualan.jam_jual, produk.nama_produk, detail_penjualan.qty, detail_penjualan.sub_total_hrg, struk.id_struk FROM (((detail_penjualan
              INNER JOIN penjualan ON detail_penjualan.penjualan = penjualan.id_penjualan)
              INNER JOIN struk ON detail_penjualan.penjualan = struk.penjualan)
              INNER JOIN produk ON detail_penjualan.produk = produk.id_produk)
            )"
        );
    }
};
