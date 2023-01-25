<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  menampilkan halaman daftar produk
    public function index(Request $request)
    {
        $search = $request->search;
        $produk = DB::table('produk')->select('*')->orderBy('nama_produk', 'ASC')
            ->where('id_produk', 'LIKE', '%' . $search . '%')
            ->orWhere('nama_produk', 'LIKE', '%' . $search . '%')
            ->orWhere('stok', 'LIKE', '%' . $search . '%')
            ->paginate(10);
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

        request()->validate(
            [
                'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1000',
                'kode_produk' => 'required|unique:produk,id_produk',
                'nama_produk' => 'required'
            ],
            [
                'kode_produk.required' => 'Kode Produk tidak boleh kosong!',
                'kode_produk.unique' => 'Kode Produk sudah pernah di isi!',
                'nama_produk.required' => 'Password tidak boleh kosong!'
            ]
        );

        $produk = new Produk;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('storage/post-images/', $filename);
            $produk->foto = $filename;
        }
        $produk->id_produk = $request->input('kode_produk');
        $produk->kategori = $request->input('id_kategori');
        $produk->nama_produk = $request->input('nama_produk');
        $produk['stok'] = 0;
        $produk->satuan_produk = $request->input('satuan_produk');
        $produk->harga_beli = $request->input('harga_beli');
        $produk->harga_jual = $request->input('harga_jual');

        $produk['user'] = 'USR02'; // Auth()->user()->id();
        $produk->save();
        return redirect()->back()->with('success', "Data berhasil di tambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // tampil detail produk
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
    // edit produk
    public function edit($id)
    {
        $produk = Produk::whereIdProduk($id)->first();
        return response()->json([
            'produk' => $produk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // update produk
    public function update(Request $request)
    {
        request()->validate(
            [
                'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1000',
                'kode_produk' => 'required',
                'nama_produk' => 'required'
            ],
            [
                'kode_produk.required' => 'Kode Produk tidak boleh kosong!',
                'kode_produk.unique' => 'Kode Produk sudah pernah di isi!',
                'nama_produk.required' => 'Password tidak boleh kosong!'
            ]
        );

        $produk_id = $request->input('produk_id');
        $produk = Produk::find($produk_id);
        if ($request->hasFile('foto')) {
            $destination = 'storage/post-images/' . $produk->foto;
            if (file::exists($destination)) {
                file::delete($destination);
            }
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('storage/post-images/', $filename);
            $produk->foto = $filename;
        }
        $produk->id_produk = $request->input('kode_produk');
        $produk->kategori = $request->input('id_kategori');
        $produk->nama_produk = $request->input('nama_produk');
        $produk->satuan_produk = $request->input('satuan_produk');
        $produk->harga_beli = $request->input('harga_beli');
        $produk->harga_jual = $request->input('harga_jual');
        $produk['user'] = 'USR02'; // Auth()->user()->id();
        $produk->update();
        return redirect()->back()->with('success', "Data berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // delete produk
    public function destroy(Request $request)
    {
        $produk_id = $request->input('delete_produk_id');
        $produk = Produk::find($produk_id);
        $destination = 'storage/post-images/' . $produk->foto;
        if (file::exists($destination)) {
            file::delete($destination);
        }
        $produk->delete();
        return redirect()->back()->with('success', "Data Berhasil di Hapus");
    }

    public function searchProduk(Request $request)
    {
        $search = $request->search;

        $produk = DB::table('produk')
            ->select(['produk.id_produk', 'produk.nama_produk', 'produk.foto', 'produk.stok', 'produk.satuan_produk', 'produk.harga_jual', 'produk.harga_beli'])
            ->orderBy('nama_produk', 'ASC')
            ->where('id_produk', 'LIKE', '%' . $search . '%')
            ->where('nama_produk', 'LIKE', '%' . $search . '%')
            ->orWhere('stok', 'LIKE', '%' . $search . '%')
            ->paginate(10);
        return view('Admin.daftarproduk', compact('produk'));
    }

    public function indexStok()
    {
        $produk = DB::select('SELECT id_produk, nama_produk FROM produk');
        $supplier = DB::select('SELECT id_supplier, nama_supplier FROM Supplier');

        return view('Admin.inputstokproduk', compact('produk', 'supplier'));
    }

    public function produkMasuk(Request $request)
    {
        request()->validate(
            [
                'qty' => 'numeric|min:1'
            ],
            ['qty.min' => 'Jumlah Masuk minimal 1']
        );

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
