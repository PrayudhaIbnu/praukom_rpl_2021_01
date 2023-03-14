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
    // halaman index admin supplier
    public function index()
    {
        $data = DB::table('supplier')->get();

        return view('admin.daftarsupplier', ['data' => $data]);
    }

    // tambah supplier
    public function tambah(Request $request)
    {
        $valid = request()->validate(
            [
                'nama_supplier' => 'required|unique:supplier,nama_supplier'
            ],
            [
                'nama_supplier.unique' => 'Supplier sudah terdaftar!'
            ]
        );

        $supplier = new Supplier;
        $id_supplier = collect(DB::select('SELECT new_idsupplier() AS new_idsupplier'))->first()->new_idsupplier;
        $supplier['id_supplier'] = $id_supplier;
        $supplier->nama_supplier = $request->input('nama_supplier');
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
        return redirect()->back()->with('success', "Data berhasil di tambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // detail supplier
    public function show($id)
    {
        $detailSupplier = collect(DB::select('CALL get_one_supplier_by_id(?)', [$id]))->first();
        return view('admin.detailsupplier', compact('detailSupplier'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // edit supplier
    public function edit($id)
    {
        //
        $supplier = Supplier::whereIdSupplier($id)->first();
        return response()->json([
            'supplier' => $supplier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  update supplier
    public function update(Request $request)
    {
        $user_id = $request->input('supplier_id');
        $supplier = Supplier::find($user_id);
        $supplier->nama_supplier = $request->input('nama_supplier');
        $supplier->alamat_supplier = $request->input('alamat_supplier');
        $supplier->telp_supplier = $request->input('telp_supplier');
        if ($request->hasFile('foto_supplier')) {
            $destination = 'storage/post-images/' . $supplier->foto_supplier;
            if (file::exists($destination)) {
                file::delete($destination);
            }
            $file = $request->file('foto_supplier');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('storage/post-images/', $filename);
            $supplier->foto_supplier = $filename;
        }
        $supplier->update();
        return redirect()->back()->with('success', "Data Berhasil di Edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  hapus supplier
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
