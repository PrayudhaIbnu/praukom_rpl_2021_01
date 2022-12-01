<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('supplier')->get();

        return view('admin.daftarsupplier', ['data' => $data]);
    }

    public function tambah(Request $request)
    {
        $supplier = new Supplier;
        $id_supplier = substr(md5(rand(0, 99999)), -4);
        $supplier['id_supplier'] = $id_supplier;
        $supplier->nama_supplier = $request->input('nama_supplier');
        // $supplier->foto_supplier = $request->file('foto_supplier')->store('post-images');
        if ($request->hasFile('foto_supplier')) {
            $file = $request->file('foto_supplier');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('storage/post-images/', $filename);
            $supplier->foto_supplier = $filename;
        }
        $supplier->alamat_supplier = $request->input('alamat_supplier');
        $supplier->telp_supplier = $request->input('telp_supplier');
        $supplier->save();
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
        $detailSupplier = collect(DB::select('CALL get_one_supplier_by_id(?)', [$id]))->first();
        // echo json_encode($edit);
        return view('admin.detailsupplier', compact('detailSupplier'));
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
    public function destroy(Request $request)
    {
        //
        $id_supplier = $request->input('delete_supplier_id');
        $supplier = Supplier::find($id_supplier);
        $destination = 'storage/post-images/' . $supplier->foto_supplier;
        if (file::exists($destination)) {
            file::delete($destination);
        }
        $supplier->delete();
        return redirect()->back()->with('success', "Data Berhasil di Hapus");
    }
}
