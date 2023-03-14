<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogProduk;

class LogAktivitasController extends Controller
{
    // log aktivitas produk halaman role pengwas
    public function logProduk(Request $request)
    {
        $logproduk = LogProduk::select()
            ->where('aktivitas', 'LIKE', '%' . $request->search . '%')
            ->orWhere('tanggal', 'LIKE', '%' . $request->search . '%')
            ->latest('id')
            ->paginate(10);
        return view('Pengawas.logproduk', compact('logproduk'));
    }
}
