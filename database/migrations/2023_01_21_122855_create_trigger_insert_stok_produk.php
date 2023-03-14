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
        DB::unprepared("DROP TRIGGER IF EXISTS insert_stok_produk");
        DB::unprepared(
            "CREATE TRIGGER insert_stok_produk
            AFTER INSERT
            ON barang_masuk
            FOR EACH ROW
            BEGIN
            DECLARE users VARCHAR(60);
            DECLARE produks VARCHAR(100);
            DECLARE jml INT(11);
            SELECT user.nama INTO users FROM user WHERE user.id = new.user;
            SELECT nama_produk INTO produks FROM produk WHERE produk.id_produk = new.produk;
            INSERT INTO log_produk  (tanggal, nama_user, aktivitas, nama_produk, jumlah) 
            VALUES (NOW(), users, 'Tambah Stok', produks, new.qty);
            END;"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insert_stok_produk');
    }
};
