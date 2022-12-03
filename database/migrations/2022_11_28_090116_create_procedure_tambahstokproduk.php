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
        DB::unprepared("DROP PROCEDURE IF EXISTS tambahstokproduk");
        DB::unprepared(
            "CREATE PROCEDURE tambahstokproduk(id CHAR(15), tgl_msk DATE, tgl_exp DATE, jumlah INT(11), supp CHAR(6))
            BEGIN
            DECLARE jumlahmasuk_last INT(11);
            INSERT INTO barang_masuk VALUES(id, tgl_msk, tgl_exp, jumlah, supp);
            SELECT stok INTO jumlahmasuk_last
                   FROM produk WHERE id_produk = id;
            SET jumlahmasuk_last = jumlahmasuk_last + jumlah;
            UPDATE produk SET stok = jumlahmasuk_last
                        WHERE id_produk = id;
            END;"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
};
