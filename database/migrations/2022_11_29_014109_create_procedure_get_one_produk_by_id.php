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
        DB::unprepared("DROP PROCEDURE IF EXISTS get_one_produk_by_id");
        DB::unprepared(
            "CREATE PROCEDURE get_one_produk_by_id(id varchar(15))
               BEGIN
                SELECT id_produk, produk_kategori.kategori_produk, nama_produk, stok,
        satuan_produk,
        harga_beli,
        harga_jual,
        foto  FROM produk INNER JOIN produk_kategori ON produk.kategori = produk_kategori.id_kategori
                WHERE id_produk = id;
                END;"
        );
    }
};
