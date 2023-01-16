     */

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
                DB::unprepared(
                    "CREATE OR REPLACE VIEW view_laporan_mingguan AS (
            SELECT penjualan.tanggal, id_faktur, produk.nama_produk, detail_penjualan.penjualan, detail_penjualan.qty, detail_penjualan.sub_total_hrg, detail_penjualan.qty*produk.harga_beli AS laba_bersih FROM ((faktur INNER JOIN penjualan ON penjualan.id_penjualan = faktur.penjualan) INNER JOIN detail_penjualan ON detail_penjualan.penjualan = penjualan.id_penjualan) INNER JOIN produk ON produk.id_produk = detail_penjualan.produk
            )"
                );
            }
        };
