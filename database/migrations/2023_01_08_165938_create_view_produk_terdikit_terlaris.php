<?php

use Illuminate\Database\Migrations\Migration;
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
            "CREATE OR REPLACE VIEW view_produk_terdikit_terlaris AS (
            SELECT produk, produk.nama_produk, SUM(qty) as qty, keterangan FROM `barang_keluar` INNER JOIN produk ON barang_keluar.produk = produk.id_produk WHERE keterangan = 'Transaksi' GROUP BY produk, nama_produk, keterangan;
            )"
        );
    }
};
