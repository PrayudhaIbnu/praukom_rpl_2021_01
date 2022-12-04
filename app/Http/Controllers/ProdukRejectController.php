<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProdukRejectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = DB::table('produk')->select()->get();
        $brg_keluar = DB::table('barang_keluar')
            ->select(['produk.nama_produk', 'barang_keluar.qty', 'barang_keluar.tanggal_keluar', 'barang_keluar.keterangan'])
            ->join('produk', 'barang_keluar.produk', '=', 'produk.id_produk')
            ->get();

        return view('admin.produkreject', compact('brg_keluar', 'produk'));
    }

    public function laporan()
    {
        $produk = DB::table('produk')->select()->get();
        $brg_keluar = DB::table('barang_keluar')
            ->select(['produk.nama_produk', 'barang_keluar.qty', 'barang_keluar.tanggal_keluar', 'barang_keluar.keterangan'])
            ->join('produk', 'barang_keluar.produk', '=', 'produk.id_produk')
            ->paginate('10');
        return view('admin.laporan', compact('brg_keluar', 'produk'));
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
        $nama_produk = $request->input('produk');
        $jml_keluar = $request->input('jml_keluar');
        $tgl_keluar = $request->input('tgl_keluar');
        $keterangan = $request->input('keterangan');
        DB::select('CALL barangkeluar(?,?,?,?)', array($nama_produk, $jml_keluar, $tgl_keluar, $keterangan));
        return redirect()->back()->with('success', "Data Berhasil di Input");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
