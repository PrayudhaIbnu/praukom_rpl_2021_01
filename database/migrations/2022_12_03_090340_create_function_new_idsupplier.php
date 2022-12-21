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
        DB::unprepared("DROP FUNCTION IF EXISTS new_idsupplier");
        DB::unprepared(
            "CREATE FUNCTION new_idsupplier()
            RETURNS CHAR(6)
            BEGIN
                DECLARE kode_lama char(6);
                DECLARE kode_baru char(6);
                DECLARE ambil_angka INT;
                DECLARE get_nol char(6);
                SELECT MAX(id_supplier) INTO kode_lama FROM supplier;
                IF (kode_lama IS NOT NULL) THEN
                    SET ambil_angka = SUBSTR(kode_lama, 4,3) + 1;
                    SET get_nol = LPAD(ambil_angka, 3, 0);
                    SET kode_baru = CONCAT('SPR', get_nol);
                    ELSE
                    SET kode_baru = 'SPR001';
                END IF;
                RETURN kode_baru;
            END;"
        );
    }
};
