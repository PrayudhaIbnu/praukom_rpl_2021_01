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

    //  menampilkan halaman daftar produk
    public function index()
    {
        $produk = DB::table('produk')->get();
        $kategori = DB::table('produk_kategori')
            ->select()
            ->get();
        return view('admin.daftarproduk', compact('produk', 'kategori'));
    }

    // menampilkan halaman listkategori
    public function listkategori()
    {
        $produk = DB::table('produk')->get();
        $kategori = DB::table('produk_kategori')
            ->select()
            ->get();
        return view('admin.listkategori', compact('produk', 'kategori'));
    }

    // tambah kategori
    public function tambahkategori(Request $request)
    {
        DB::table('produk_kategori')->insert([
            'kategori_produk' => $request['nama_kategori']
        ]);
        return redirect()->back()->with('success', "Data berhasi di tambah");
    }

    // edit kategori
    public function editkategori($id)
    {
        $kategori = DB::table('produk_kategori')->where('id_kategori', $id)->first();
        return response()->json([
            'kategori' => $kategori,
        ]);
    }

    // update kategori
    public function updatekategori(Request $request)
    {
        $id_kategori = $request->input('kategori_id');
        DB::table('produk_kategori')->where('id_kategori', $id_kategori)->update([
            'kategori_produk' => $request['nama_kategori']
        ]);

        return redirect()->back()->with('success', "Data berhasi di Edit");
    }

    // tambah produk
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
        $produk['user'] = 'USR02'; // Auth()->user()->id();
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


    // untuk produk reject
    // 1. tampilan halaman produk reject
    public function indexprodukreject()
    {
        $produk = DB::table('produk')->select()->get();
        $brg_keluar = DB::table('barang_keluar')
            ->select(['produk.nama_produk', 'barang_keluar.qty', 'barang_keluar.tanggal_keluar', 'barang_keluar.keterangan'])
            ->join('produk', 'barang_keluar.produk', '=', 'produk.id_produk')
            ->get();

        return view('admin.produkreject', compact('brg_keluar', 'produk'));
    }
    // 2.function tambah procuk reject
    public function storeprodukreject(Request $request)
    {
        $nama_produk = $request->input('produk');
        $jml_keluar = $request->input('jml_keluar');
        $tgl_keluar = $request->input('tgl_keluar');
        $keterangan = $request->input('keterangan');
        DB::select('CALL barangkeluar(?,?,?,?)', array($nama_produk, $jml_keluar, $tgl_keluar, $keterangan));
        return redirect()->back()->with('success', "Data Berhasil di Input");
    }
}
