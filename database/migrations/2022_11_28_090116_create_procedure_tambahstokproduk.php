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
            "CREATE PROCEDURE tambahstokproduk(id VARCHAR(15), tgl_msk DATE, tgl_exp DATE, jml INT(11), supp CHAR(6), usr INT(11))
            BEGIN
            DECLARE jumlahmasuk_last INT(11);
            DECLARE pesan_error CHAR(5) DEFAULT '00000';
            DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
            
            BEGIN
            GET DIAGNOSTICS CONDITION 1
            pesan_error = RETURNED_SQLSTATE;
            END;
            
            SELECT stok INTO jumlahmasuk_last
            FROM produk WHERE id_produk = id;
            
            START TRANSACTION;
            SAVEPOINT satu;
            INSERT INTO barang_masuk VALUES(id, tgl_msk, tgl_exp, jml, supp, usr);
            
            IF pesan_error != '00000' THEN ROLLBACK TO satu;
            END IF;
            
            SET jumlahmasuk_last = jumlahmasuk_last + jml;
            UPDATE produk SET stok = jumlahmasuk_last
            WHERE id_produk = id;
            
            IF pesan_error != '00000' THEN ROLLBACK TO satu;
            END IF;
            COMMIT;
            
            END;"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
};
