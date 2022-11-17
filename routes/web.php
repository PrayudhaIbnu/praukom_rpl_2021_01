<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth', function () {
    return view('auth.login');
});



// ROUTES UNTUK  ROLE SUPER ADMIN
Route::get('/superadmin/kelolaakun', [SuperAdminController::class, 'index']);
Route::post('tambah-user', [SuperAdminController::class, 'tambah']);
Route::get('edit-user', [SuperAdminController::class, 'edit']);

// ROUTES UNTUK ROLE ADMIN
// Routes Dashboard Admin
Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/produk', function () {
        return view('admin.daftarproduk');
    });
});
// Routes CRUD Admin

// ROUTES UNTUK ROLE KASIR
// Routes Dashboard Kasir
Route::prefix('/kasir')->group(function () {
    Route::get('/dashboard', function () {
        return view('kasir.dashboard');
    });

    Route::get('/transaksi', function () {
        return view('kasir.transaksi');
    });

    Route::get('/laporan', function () {
        return view('kasir.laporan');
    });

    Route::get('/log', function () {
        return view('kasir.logaktivitas');
    });
});
// Routes CRUD Kasir


// ROUTES UNTUK ROLE PENGAWAS

Route::prefix('/pengawas')->group(function () {
    Route::get('/dashboard', function () {
        return view('pengawas.index');
    });
    Route::get('/laporan', function () {
        return view('pengawas.laporan');
    });
    Route::get('/logproduk', function () {
        return view('pengawas.logproduk');
    });
    Route::get('/logkelolaakun', function () {
        return view('pengawas.logkelolaakun');
    });
    Route::get('/historypenjualan', function () {
        return view('pengawas.historypenjualan');
    });
});
