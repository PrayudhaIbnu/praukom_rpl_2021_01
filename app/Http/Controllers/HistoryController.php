<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    //untuk tampilan history barang keluar role admin
    public function historybarangkeluar()
    {
        $produk = DB::table('produk')->select()->get();
        $brg_keluar = DB::table('barang_keluar')
            ->select(['produk.nama_produk', 'barang_keluar.qty', 'barang_keluar.tanggal_keluar', 'barang_keluar.keterangan'])
            ->join('produk', 'barang_keluar.produk', '=', 'produk.id_produk')
            ->paginate('10');
        return view('admin.historybarangkeluar', compact('brg_keluar', 'produk'));
    }

    // untuk tampilan history barang masuk role admin
    public function historybarangmasuk()
    {
        $produk = DB::table('produk')->select()->get();
        $supplier = DB::table('supplier')->select()->get();
        $brg_masuk = DB::table('barang_masuk')
            ->select(['produk.nama_produk', 'barang_masuk.tanggal_masuk', 'barang_masuk.tanggal_exp', 'barang_masuk.qty', 'supplier.nama_supplier'])
            ->join('produk', 'barang_masuk.produk', '=', 'produk.id_produk')
            ->join('supplier', 'barang_masuk.supplier', '=', 'supplier.id_supplier')
            ->paginate('10');
        return view('admin.historybarangmasuk', compact('brg_masuk', 'supplier', 'produk'));
    }

    //untuk tampilan history barang keluar role pengawas
    public function riwayatbarangkeluar()
    {
        $produk = DB::table('produk')->select()->get();
        $brg_keluar = DB::table('barang_keluar')
            ->select(['produk.nama_produk', 'barang_keluar.qty', 'barang_keluar.tanggal_keluar', 'barang_keluar.keterangan'])
            ->join('produk', 'barang_keluar.produk', '=', 'produk.id_produk')
            ->paginate('10');
        return view('pengawas.historybarangkeluar', compact('brg_keluar', 'produk'));
    }

    // untuk tampilan history barang masuk role pengawas
    public function riwayatbarangmasuk()
    {
        $produk = DB::table('produk')->select()->get();
        $supplier = DB::table('supplier')->select()->get();
        $brg_masuk = DB::table('barang_masuk')
            ->select(['produk.nama_produk', 'barang_masuk.tanggal_masuk', 'barang_masuk.tanggal_exp', 'barang_masuk.qty', 'supplier.nama_supplier'])
            ->join('produk', 'barang_masuk.produk', '=', 'produk.id_produk')
            ->join('supplier', 'barang_masuk.supplier', '=', 'supplier.id_supplier')
            ->paginate('10');
        return view('Pengawas.historybarangmasuk', compact('brg_masuk', 'supplier', 'produk'));
    }
}
