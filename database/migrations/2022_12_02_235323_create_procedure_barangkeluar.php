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
        DB::unprepared("DROP PROCEDURE IF EXISTS barangkeluar");
        DB::unprepared(
            "CREATE PROCEDURE barangkeluar(id VARCHAR(15), jml INT(11), tgl_keluar DATE, keterangan TEXT)
            BEGIN
            DECLARE jumlahkeluar_last INT(11);
            INSERT INTO barang_keluar VALUES(id, jml, tgl_keluar, keterangan);
            SELECT stok INTO jumlahkeluar_last
            FROM produk WHERE id_produk = id;
            SET jumlahkeluar_last = jumlahkeluar_last - jml;
            UPDATE produk SET stok = jumlahkeluar_last
            WHERE id_produk = id;
            END;"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::dropIfExists('procedure_barangkeluar');
    // }
};
