<?php

namespace App\Http\Controllers;

use App\Models\LogProduk;

class LogAktivitasController extends Controller
{
    // log aktivitas produk halaman role pengwas
    public function logProduk()
    {
        $logproduk = LogProduk::select()->get();
        return view('Pengawas.logproduk', compact('logproduk'));
    }
}
