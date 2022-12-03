<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = DB::table('produk')->get();
        $kategori = DB::table('produk_kategori')
            ->select()
            ->get();
        return view('admin.daftarproduk', compact('produk', 'kategori'));
    }

    public function store(Request $request)
    {
        //
        $produk = new Produk;
        $produk->id_produk = $request->input('kode_produk');
        $produk->kategori = $request->input('id_kategori');
        $produk->nama_produk = $request->input('nama_produk');
        $produk['stok'] = 0;
        $produk->satuan_produk = $request->input('satuan_produk');
        $produk->harga_beli = $request->input('harga_beli');
        $produk->harga_jual = $request->input('harga_jual');
        // $produk->foto_produk = $request->file('foto_produk')->store('post-images');
        $produk['user'] = 'USR02';
        $produk->save();
        return redirect()->back()->with('success', "Data berhasi di tambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $detailProduk = collect(DB::select('CALL get_one_produk_by_id(?)', [$id]))->first();
        // echo json_encode($edit);
        return view('admin.detailproduk', compact('detailProduk'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function indexstok()
    {
        $produk = DB::select('SELECT id_produk, nama_produk FROM produk');
        $supplier = DB::select('SELECT id_supplier, nama_supplier FROM Supplier');

        return view('Admin.inputstokproduk', compact('produk', 'supplier'));
    }

    public function produkmasuk(Request $request)
    {
        $id = $request->input('id_produk');
        $tgl_msk = $request->input('tgl_msk');
        $tgl_exp = $request->input('tgl_exp');
        $jumlah = $request->input('qty');
        $supp = $request->input('id_supplier');
        DB::select('CALL tambahstokproduk(?, ?, ?, ?, ?)', [$id, $tgl_msk, $tgl_exp, $jumlah, $supp]);

        return redirect()->back()->with('success', "Data berhasil di input");
    }

    public function produkreject(Request $request)
    {
    }
}
