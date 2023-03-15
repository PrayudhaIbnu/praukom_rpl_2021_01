<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\RiwayatTransaksi;

class RiwayatController extends Controller
{
    // untuk  halaman history barang masuk role admin dan pengawas
    public function RiwayatBarangmasuk(Request $request)
    {
        $produk = Produk::select()->get();
        $supplier = Supplier::select()->get();
        $brg_masuk = BarangMasuk::select(['produk.nama_produk', 'barang_masuk.tanggal_masuk', 'barang_masuk.tanggal_exp', 'barang_masuk.qty', 'supplier.nama_supplier'])
            ->join('produk', 'barang_masuk.produk', '=', 'produk.id_produk')
            ->join('supplier', 'barang_masuk.supplier', '=', 'supplier.id_supplier')
            ->where('nama_produk', 'LIKE', '%' . $request->search . '%')
            ->orWhere('tanggal_masuk', 'LIKE', '%' . $request->search . '%')
            ->paginate('10');
        return view('components.riwayat-barangmasuk', compact('brg_masuk', 'supplier', 'produk'));
    }

    //untuk  halaman history barang keluar role admin dan pengawas
    public function RiwayatBarangkeluar(Request $request)
    {
        $search = $request->search;
        $produk = Produk::select()->get();
        $brg_keluar = BarangKeluar::select(['produk.nama_produk', 'barang_keluar.qty', 'barang_keluar.tanggal_keluar', 'barang_keluar.keterangan'])
            ->join('produk', 'barang_keluar.produk', '=', 'produk.id_produk')
            ->where('nama_produk', 'LIKE', '%' . $request->search . '%')
            ->orWhere('tanggal_keluar', 'LIKE', '%' . $request->search . '%')
            ->paginate('10');
        return view('components.riwayat-barangkeluar', compact('brg_keluar', 'produk'));
    }

    // untuk halaman riwayat penjualan role kasir dan pengawas
    public function RiwayatPenjualan(Request $request)
    {
        $tglHarian = date('Y-m-d');
        $riwayat = RiwayatTransaksi::select()
            ->where('tanggal', $tglHarian)
            ->latest('id_struk')
            ->paginate(10);

        return view('components.riwayat-penjualan', compact('riwayat'));
    }
}
