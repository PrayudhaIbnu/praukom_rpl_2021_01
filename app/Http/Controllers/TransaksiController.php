<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        // $ = DB::
    }

    public function index()
    {
        // $data = DB::
        $produk = DB::select('SELECT id_produk, nama_produk FROM produk');
        // $cart = Cart::all();
        $cart = DB::table('detail_penjualan')
            ->select(['detail_penjualan.produk', 'detail_penjualan.penjualan', 'detail_penjualan.qty', 'produk.harga_jual', 'detail_penjualan.sub_total_hrg'])
            ->join('produk', 'detail_penjualan.produk', '=', 'produk.id_produk')
            // ->orderBy('nama', 'ASC')
            ->get();

        return view('Kasir.transaksi', compact('produk', 'cart'));
    }

    public function addcart(Request $request)
    {
        // $ = D
        $cart = new Cart;
        $cart->produk = $request->input('produk');
        // $cart->penjualan = $request->input('produk');
        $cart->qty = $request->input('qty');
        // produk.harga_jual * $request->input('qty');
        // $sub_total = ;
        // $cart['sub_total_hrg'] = $sub_total;
    }

    public function create()
    {
        // $data = DB::
        // DB::select('SELECT ')
    }
}
