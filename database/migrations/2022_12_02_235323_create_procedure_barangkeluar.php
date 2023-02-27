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
            "CREATE PROCEDURE barangkeluar(id VARCHAR(15), jml INT(11), tgl_keluar DATE, keterangan TEXT, usr INT(11))
            BEGIN

                DECLARE jumlahkeluar_last INT(11);
                DECLARE pesan_error CHAR(5) DEFAULT '00000';
                DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
                BEGIN

                GET DIAGNOSTICS CONDITION 1
                pesan_error = RETURNED_SQLSTATE;
                END;

                SELECT stok INTO jumlahkeluar_last
                FROM produk WHERE id_produk = id;

                START TRANSACTION;
                SAVEPOINT satu;
                
                INSERT INTO barang_keluar 
                VALUES(id, jml, tgl_keluar, keterangan, usr);
            
                IF pesan_error != '00000' THEN ROLLBACK TO satu;
                END IF;

                SET jumlahkeluar_last = jumlahkeluar_last - jml;
                UPDATE produk SET stok = jumlahkeluar_last
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
    // public function down()
    // {
    //     Schema::dropIfExists('procedure_barangkeluar');
    // }
};
