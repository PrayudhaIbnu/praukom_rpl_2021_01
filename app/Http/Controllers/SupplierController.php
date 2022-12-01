<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //
        $detail = collect(DB::select('CALL get_one_supplier_by_id(?)', [$id]))->first();
        // echo json_encode($edit);
        return view('admin.detailsupplier', compact('detail'));
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
