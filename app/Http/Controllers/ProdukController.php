<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\{Auth, Session};

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
        $kategori = DB::table('produk_kategori')->select()->get();
        $produk = DB::table('produk')
            ->select('*')
            ->orderBy('nama_produk', 'ASC')
            ->where('id_produk', 'LIKE', '%' . $search . '%')
            ->orWhere('nama_produk', 'LIKE', '%' . $search . '%')
            ->paginate(10);

        return view('admin.daftarproduk', compact('produk', 'kategori'));
    }

    // untuk halaman daftar produk role kasir
    public function KasirDaftarProduk()
    {
        $produk = DB::table('produk')->select('*')->paginate(10);
        $kategori = DB::table('produk_kategori')
            ->select()
            ->get();
        return view('kasir.daftarproduk', compact('produk', 'kategori'));
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
        request()->validate(
            [
                'nama_kategori' => 'required|unique:produk_kategori,kategori_produk',

            ],
            [
                'nama_kategori.required' => 'Kategori Wajib di Isi !',
                'nama_kategori.unique' => 'Kategori Sudah Tersedia !'
            ]
        );
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
        request()->validate(
            [
                'kategori' => 'required',

            ],
            [
                'kategori.required' => 'Kategori Wajib di Isi !',
            ]
        );
        $id_kategori = $request->input('kategori_id');
        DB::table('produk_kategori')->where('id_kategori', $id_kategori)->update([
            'kategori_produk' => $request['kategori']
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
                'kode_produk' => 'required',
                'nama_produk' => 'required',
                // 'satuan_produk' => 'required',
                'harga_beli' => 'required|numeric|min:1',
                'harga_jual' => 'required|numeric|min:1',

            ],
            [
                'kode_produk.required' => 'Kade Produk Wajib di Isi !',
                'kode_produk.unique' => 'Kode Produk sudah pernah di isi!',
                'nama_produk.required' => 'Nama Produk Wajib di Isi !',
                'harga_beli.required' => 'Harga Beli Wajib di Isi !',
                'harga_beli.numeric' => 'Tidak Boleh Kurang Dari 0 !',
                'harga_jual.required' => 'Harga Beli Wajib di Isi !',
                'harga_jual.numeric' => 'Tidak Boleh Kurang Dari 0 !'
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
        $produk->satuan_produk = $request->input('satuan_produk');
        $produk['stok'] = 0;
        $produk['terjual'] = 0;
        $produk->harga_beli = $request->input('harga_beli');
        $produk->harga_jual = $request->input('harga_jual');

        $produk['user'] = Session::get('levelbaru')->id;
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
        $produk['user'] = Session::get('levelbaru')->id;
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
                'id_produk' => 'required',
                'tgl_msk' => 'required',
                'tgl_exp' => 'required',
                'qty' => 'required|numeric|min:1',
                'id_supplier' => 'required'
            ],
            [
                'id_produk.required' => 'Pilih Produk !',
                'tgl_msk.required' => 'Masukkan Tanggal !',
                'tgl_exp.required' => 'Masukkan Tanggal !',
                'qty.required' => 'Jumlah tidak boleh kosong !',
                'qty.min' => 'Masukkan Jumlah Lebih Dari 0 !',
                'id_supplier.required' => 'Pilih Supplier !',
            ]
        );

        $id = $request->input('id_produk');
        $tgl_msk = $request->input('tgl_msk');
        $tgl_exp = $request->input('tgl_exp');
        $jml = $request->input('qty');
        $supp = $request->input('id_supplier');
        $user = Session::get('levelbaru')->id;
        DB::select('CALL tambahstokproduk(?, ?, ?, ?, ?, ?)', [$id, $tgl_msk, $tgl_exp, $jml, $supp, $user]);
        // dd($stok);
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
        request()->validate(
            [
                'produk' => 'required',
                'jml_keluar' => 'required|numeric|min:1',
                'tgl_keluar' => 'required',
                'keterangan' => 'required',
            ],
            [
                'produk.required' => 'Pilih Produk !',
                'tgl_keluar.required' => 'Masukkan Tanggal !',
                'jml_keluar.required' => 'Jumlah tidak boleh kosong !',
                'jml_keluar.min' => 'Masukkan Jumlah Lebih Dari 0 !',
                'keterangan.required' => 'Keterangan Wajib di Isi !',
            ]
        );

        $nama_produk = $request->input('produk');
        $jml_keluar = $request->input('jml_keluar');
        $tgl_keluar = $request->input('tgl_keluar');
        $keterangan = $request->input('keterangan');
        $user = Session::get('levelbaru')->id;

        DB::select('CALL barangkeluar(?,?,?,?,?)', array($nama_produk, $jml_keluar, $tgl_keluar, $keterangan, $user));
        return redirect()->back()->with('success', "Data Berhasil di Input");
    }
}
