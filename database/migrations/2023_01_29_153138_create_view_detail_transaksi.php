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
            "CREATE OR REPLACE VIEW detail_transaksi AS (
              SELECT faktur.id_faktur, 
              user.nama, 
              penjualan.tanggal, penjualan.jam_jual, produk.nama_produk, detail_penjualan.qty, produk.harga_jual, detail_penjualan.sub_total_hrg, faktur.grand_total, faktur.jml_tunai, faktur.jml_kembalian 
                FROM faktur
                INNER JOIN penjualan ON faktur.penjualan = penjualan.id_penjualan
                INNER JOIN detail_penjualan ON penjualan.id_penjualan = detail_penjualan.penjualan
                INNER JOIN user ON faktur.kasir = user.id
                INNER JOIN produk ON detail_penjualan.produk = produk.id_produk
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
        Schema::dropIfExists('detail_transaksi');
    }
};
