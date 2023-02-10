<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LogAktivitasController extends Controller
{
    // log aktivitas produk halaman role pengwas
    public function logProduk()
    {
        $logproduk = DB::table('log_produk')->select()->get();
        return view('Pengawas.logproduk', compact('logproduk'));
    }
}
