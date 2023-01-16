<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("DROP FUNCTION IF EXISTS new_iduser");
        DB::unprepared(
            "CREATE FUNCTION new_iduser()
            RETURNS CHAR(5)
            BEGIN
                DECLARE kode_lama char(5);
                DECLARE kode_baru char(5);
                DECLARE ambil_angka INT;
                DECLARE get_nol char(5);
                SELECT MAX(id_user) INTO kode_lama FROM user;
                SET ambil_angka = SUBSTR(kode_lama, 4, 2) + 1;
                SET get_nol = LPAD(ambil_angka, 2, 0);
                SET kode_baru = CONCAT('USR', get_nol);
                RETURN kode_baru;
            END;"
        );
    }
};
