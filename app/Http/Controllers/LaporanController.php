<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    //
    public function indexAdmin(Request $request)
    {
        $tglHarian = date('Y-m-d');
        $tglMingguan = date('Y-m');
        $tglBulanan = date('Y');

        $harian = DB::select(DB::raw("SELECT penjualan.tanggal, penjualan.jam_jual, produk.nama_produk, penjualan, qty, sub_total_hrg, qty*produk.harga_beli AS laba_bersih FROM (detail_penjualan INNER JOIN produk ON detail_penjualan.produk = produk.id_produk) INNER JOIN penjualan ON detail_penjualan.penjualan = penjualan.id_penjualan WHERE penjualan.tanggal =' $tglHarian'"));

        $mingguan = DB::select(DB::raw("SELECT * FROM laporan_mingguan
        WHERE tanggal LIKE '$tglMingguan%' ORDER BY tanggal DESC"));

        $bulanan = DB::select(DB::raw("SELECT * FROM laporan_mingguan
        WHERE tanggal LIKE '$tglBulanan%' ORDER BY tanggal DESC"));

        return view('Admin.laporan', compact('harian', 'mingguan', 'bulanan'));
    }

    public function indexPengawas()
    {
        $tglHarian = date('Y-m-d');
        $tglMingguan = date('Y-m');
        $tglBulanan = date('Y');

        $harian = DB::select(DB::raw("SELECT penjualan.tanggal, penjualan.jam_jual, produk.nama_produk, penjualan, qty, sub_total_hrg, qty*produk.harga_beli AS laba_bersih FROM (detail_penjualan INNER JOIN produk ON detail_penjualan.produk = produk.id_produk) INNER JOIN penjualan ON detail_penjualan.penjualan = penjualan.id_penjualan WHERE penjualan.tanggal =' $tglHarian'"));

        // $mingguan = DB::select(DB::raw("SELECT penjualan.tanggal, id_faktur, grand_total, detail_penjualan.qty*produk.harga_beli AS grand_bersih FROM ((faktur INNER JOIN penjualan ON faktur.penjualan = penjualan.id_penjualan) RIGHT JOIN detail_penjualan ON detail_penjualan.penjualan = faktur.penjualan) INNER JOIN produk ON produk.id_produk = detail_penjualan.produk WHERE penjualan.tanggal LIKE '$tglMingguan%'"));

        // SELECT penjualan.tanggal, id_faktur, produk.nama_produk, detail_penjualan.penjualan, detail_penjualan.qty, detail_penjualan.sub_total_hrg, detail_penjualan.qty*produk.harga_beli AS laba_bersih FROM ((faktur INNER JOIN penjualan ON penjualan.id_penjualan = faktur.penjualan) INNER JOIN detail_penjualan ON detail_penjualan.penjualan = penjualan.id_penjualan) INNER JOIN produk ON produk.id_produk = detail_penjualan.produk 
        $mingguan = DB::select(DB::raw("SELECT * FROM laporan_mingguan
        WHERE tanggal LIKE '$tglMingguan%' ORDER BY tanggal DESC"));

        $bulanan = DB::select(DB::raw("SELECT * FROM laporan_mingguan
        WHERE tanggal LIKE '$tglBulanan%' ORDER BY tanggal DESC"));
        // SELECT penjualan.tanggal, id_faktur, faktur.grand_total, qty*produk.harga_beli AS grand_bersih FROM ((detail_penjualan INNER JOIN penjualan ON detail_penjualan.penjualan = penjualan.id_penjualan) INNER JOIN faktur ON detail_penjualan.penjualan = faktur.penjualan) INNER JOIN produk ON produk.id_produk = detail_penjualan.produk 

        return view('Pengawas.laporan', compact('harian', 'mingguan', 'bulanan'));
    }

    public function cetakHarian(Request $request)
    {
        $tgl = $request->tgl;
        // Buat ngambil format tanggal kek => Minggu, 25 Desember 2022
        $date = Carbon::now()->format('l, d F Y');
        $harian = DB::select(DB::raw("SELECT penjualan.tanggal, penjualan.jam_jual, produk.nama_produk, penjualan, qty, sub_total_hrg, qty*produk.harga_beli AS laba_bersih FROM (detail_penjualan INNER JOIN produk ON detail_penjualan.produk = produk.id_produk) INNER JOIN penjualan ON detail_penjualan.penjualan = penjualan.id_penjualan WHERE penjualan.tanggal =' $tgl'"));

        return view('components.cetakpdf.cetaklaporan-harian', compact('harian', 'date'));
    }

    public function cetakMingguan(Request $request)
    {
        $tglAwal = $request->tglawal;
        $tglAkhir =  date('Y-m-d', strtotime("+6 day", strtotime($tglAwal)));

        $mingguan = DB::select(DB::raw(
            "SELECT * FROM laporan_mingguan
            WHERE tanggal BETWEEN '$tglAwal' AND DATE_SUB('$tglAwal', INTERVAL -7 DAY) ORDER BY tanggal DESC"
        ));

        // $getTotal = DB::select(DB::raw(
        //     "SELECT penjualan.tanggal, id_faktur, faktur.grand_total, qty, sum(qty) AS total_qty, qty*produk.harga_beli AS grand_bersih FROM ((detail_penjualan INNER JOIN penjualan ON detail_penjualan.penjualan = penjualan.id_penjualan) INNER JOIN faktur ON detail_penjualan.penjualan = faktur.penjualan) INNER JOIN produk ON produk.id_produk = detail_penjualan.produk WHERE penjualan.tanggal BETWEEN '$tglAwal' AND '$tglAkhir'"
        // ));

        return view('components.cetakpdf.cetaklaporan-mingguan', compact('mingguan', 'tglAwal', 'tglAkhir'));
    }

    public function cetakBulanan(Request $request)
    {
        $tglBulanan = $request->tglawal;

        // Masih bingung tampilanny mau dibuat kek gmn hmm
        $bulanan = DB::select(DB::raw("SELECT * FROM laporan_mingguan
        WHERE tanggal BETWEEN '$tglBulanan' AND DATE_SUB('$tglBulanan', INTERVAL -1 MONTH) ORDER BY tanggal DESC"));

        return view('components.cetakpdf.cetaklaporan-bulanan', compact('bulanan'));
    }

    public function dashboardAdmin()
    {
        $leastStock = DB::select('SELECT nama_produk, stok FROM produk ORDER BY stok ASC LIMIT 10');

        $getExp = date('Y-m-d');
        $expiredProduct = DB::select(DB::raw("SELECT nama_produk, supplier.nama_supplier, barang_masuk.tanggal_masuk, barang_masuk.tanggal_exp FROM (produk INNER JOIN barang_masuk ON produk.id_produk = barang_masuk.produk) INNER JOIN supplier ON barang_masuk.supplier = supplier.id_supplier WHERE barang_masuk.tanggal_exp >= '$getExp%' ORDER BY barang_masuk.tanggal_exp ASC LIMIT 20"));

        $bestSell = DB::select("SELECT * FROM produk_terdikit_terlaris ORDER BY qty DESC LIMIT 5");

        $leastSell = DB::select("SELECT * FROM produk_terdikit_terlaris ORDER BY qty ASC LIMIT 5");

        return view('Admin.dashboard', compact('leastStock', 'expiredProduct', 'bestSell', 'leastSell'));
    }
}
