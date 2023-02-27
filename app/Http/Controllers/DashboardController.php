<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // untuk dashboard admin
    public function dashboardAdmin()
    {
        $leastStock = DB::select('SELECT nama_produk, stok FROM produk WHERE stok > 0 ORDER BY stok ASC LIMIT 10');

        $getExp = date('Y-m-d');
        $expiredProduct = DB::select(DB::raw("SELECT nama_produk, supplier.nama_supplier, barang_masuk.tanggal_masuk, barang_masuk.tanggal_exp FROM (produk INNER JOIN barang_masuk ON produk.id_produk = barang_masuk.produk) INNER JOIN supplier ON barang_masuk.supplier = supplier.id_supplier WHERE barang_masuk.tanggal_exp >= '$getExp%' ORDER BY barang_masuk.tanggal_exp ASC LIMIT 20"));

        $bestSell = DB::select("SELECT * FROM produk_terdikit_terlaris WHERE terjual > 0 ORDER BY terjual DESC LIMIT 5");

        $leastSell = DB::select("SELECT * FROM produk_terdikit_terlaris WHERE terjual > 0 ORDER BY terjual ASC LIMIT 5");

        $totalProduk = DB::select("SELECT total FROM total_produk");
        $totalStokProduk = DB::select("SELECT * FROM total_stokproduk");
        $totalSupplier = DB::select("SELECT * FROM total_supplier");

        return view('Admin.index', compact('leastStock', 'expiredProduct', 'bestSell', 'leastSell', 'totalProduk', 'totalStokProduk', 'totalSupplier'));
    }
    // untuk dashboard pengawas
    public function dashboardPengawas()
    {
        $leastStock = DB::select('SELECT nama_produk, stok FROM produk WHERE stok > 0 ORDER BY stok ASC LIMIT 10');

        $getExp = date('Y-m-d');
        $expiredProduct = DB::select(DB::raw("SELECT nama_produk, supplier.nama_supplier, barang_masuk.tanggal_masuk, barang_masuk.tanggal_exp FROM (produk INNER JOIN barang_masuk ON produk.id_produk = barang_masuk.produk) INNER JOIN supplier ON barang_masuk.supplier = supplier.id_supplier WHERE barang_masuk.tanggal_exp >= '$getExp%' ORDER BY barang_masuk.tanggal_exp ASC LIMIT 20"));

        $bestSell = DB::select("SELECT * FROM produk_terdikit_terlaris WHERE terjual > 0 ORDER BY terjual DESC LIMIT 5");

        $leastSell = DB::select("SELECT * FROM produk_terdikit_terlaris WHERE terjual > 0 ORDER BY terjual ASC LIMIT 5");

        return view('Pengawas.index', compact('leastStock', 'expiredProduct', 'bestSell', 'leastSell'));
    }

    // untuk dashboard kasir
    public function dashboardKasir()
    {
        $getExp = date('Y-m-d');
        $expiredProduct = DB::select(DB::raw("SELECT nama_produk, supplier.nama_supplier, barang_masuk.tanggal_masuk, barang_masuk.tanggal_exp FROM (produk INNER JOIN barang_masuk ON produk.id_produk = barang_masuk.produk) INNER JOIN supplier ON barang_masuk.supplier = supplier.id_supplier WHERE barang_masuk.tanggal_exp >= '$getExp%' ORDER BY barang_masuk.tanggal_exp ASC LIMIT 20"));

        $bestSell = DB::select("SELECT * FROM produk_terdikit_terlaris WHERE terjual > 0 ORDER BY terjual DESC LIMIT 5");

        $leastSell = DB::select("SELECT * FROM produk_terdikit_terlaris WHERE terjual > 0 ORDER BY terjual ASC LIMIT 5");

        return view('Kasir.index', compact('expiredProduct', 'bestSell', 'leastSell'));
    }
}
