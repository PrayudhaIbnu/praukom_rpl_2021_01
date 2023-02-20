<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    //Untuk halaman laporan role admin
    public function LaporanAdmin(Request $request)
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

    // Uuntuk halaman laporan role pengawas
    public function LaporanPengawas()
    {
        $tglHarian = date('Y-m-d');
        $tglMingguan = date('Y-m');
        $tglBulanan = date('Y');

        $harian = DB::select(DB::raw("SELECT penjualan.tanggal, penjualan.jam_jual, produk.nama_produk, penjualan, qty, sub_total_hrg, qty*produk.harga_beli AS laba_bersih FROM (detail_penjualan INNER JOIN produk ON detail_penjualan.produk = produk.id_produk) INNER JOIN penjualan ON detail_penjualan.penjualan = penjualan.id_penjualan WHERE penjualan.tanggal =' $tglHarian'"));

        $mingguan = DB::select(DB::raw("SELECT * FROM laporan_mingguan
        WHERE tanggal LIKE '$tglMingguan%' ORDER BY tanggal DESC"));

        $bulanan = DB::select(DB::raw("SELECT * FROM laporan_mingguan
        WHERE tanggal LIKE '$tglBulanan%' ORDER BY tanggal DESC"));

        return view('Pengawas.laporan', compact('harian', 'mingguan', 'bulanan'));
    }

    // Cetak laporan harian role Admin dan Pengawas
    public function cetakHarian(Request $request)
    {
        $tgl = $request->tgl;
        // Buat ngambil format tanggal kek => Minggu, 25 Desember 2022
        $date = Carbon::now()->format('l, d F Y');
        $harian = DB::select(DB::raw("SELECT penjualan.tanggal, penjualan.jam_jual, produk.nama_produk, penjualan, qty, sub_total_hrg, qty*produk.harga_beli AS laba_bersih FROM (detail_penjualan INNER JOIN produk ON detail_penjualan.produk = produk.id_produk) INNER JOIN penjualan ON detail_penjualan.penjualan = penjualan.id_penjualan WHERE penjualan.tanggal =' $tgl'"));

        return view('components.cetakpdf.cetaklaporan-harian', compact('harian', 'date'));
    }

    // Cetak laporan Mingguan role Admin dan Pengawas
    public function cetakMingguan(Request $request)
    {
        $tglAwal = $request->tglawal;
        $tglAkhir =  date('Y-m-d', strtotime("+6 day", strtotime($tglAwal)));

        $mingguan = DB::select(DB::raw(
            "SELECT * FROM laporan_mingguan
            WHERE tanggal BETWEEN '$tglAwal' AND DATE_SUB('$tglAwal', INTERVAL -7 DAY) ORDER BY tanggal DESC"
        ));

        return view('components.cetakpdf.cetaklaporan-mingguan', compact('mingguan', 'tglAwal', 'tglAkhir'));
    }

    // Cetak laporan Bulanan role Admin dan Pengawas
    public function cetakBulanan(Request $request)
    {

        $tglBulanan = $request->tglawal;
        $tglBulanan2 = date('Y-m-d', strtotime("+1 month", strtotime($tglBulanan)));

        // Masih bingung tampilanny mau dibuat kek gmn hmm
        $bulanan = DB::select(DB::raw("SELECT * FROM   laporan_mingguan
        WHERE tanggal BETWEEN '$tglBulanan' AND DATE_SUB('$tglBulanan', INTERVAL -1 MONTH) ORDER BY tanggal DESC"));

        return view('components.cetakpdf.cetaklaporan-bulanan', compact('bulanan', 'tglBulanan', 'tglBulanan2'));
    }
}
