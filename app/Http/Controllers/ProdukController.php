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

    public function produkreject(Request $request)
    {
    }

    public function tambah(Request $request)
    {
        $produk = new Produk;
        // $id_produk = substr(md5(rand(0, 99999)), -4);
        // $produk['id_produk'] = $id_produk;
        $produk->id_produk = $request->input('kode_produk');
        $produk->kategori = $request->input('id_kategori');
        $produk->nama_produk = $request->input('nama_produk');
        // $stok = 0;
        $produk['stok'] = 0;
        $produk->satuan_produk = $request->input('satuan_produk');
        $produk->harga_beli = $request->input('harga_beli');
        $produk->harga_jual = $request->input('harga_jual');
        // $produk->foto_produk = $request->file('foto_produk')->store('post-images');
        // $produk->supplier = $request->input('supplier');
        $produk['user'] = 'USR00';
        $produk->save();
        return redirect()->back()->with('success', "Data berhasi di tambah");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
