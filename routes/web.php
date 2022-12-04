<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProdukRejectController;
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

Route::get('/login', function () {
    return view('auth.login');
});



// ROUTES Super Admin
Route::controller(SuperAdminController::class)->group(function () {
    Route::get('/superadmin/kelolaakun', 'index');
    Route::post('tambah-user', 'store');
    Route::get('/superadmin/edit-user/{id}', 'edit');
    Route::put('update-user',  'update');
    Route::delete('delete-user',  'destroy');
});

// ROUTES UNTUK ROLE ADMIN
Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/produk', function () {
        return view('admin.daftarproduk');
    });
    // Route::get('/produkreject', function () {
    //     return view('admin.produkreject');
    // });
    Route::get('/inputstok', function () {
        return view('admin.inputstokproduk');
    });
    Route::get('/listkategori', function () {
        return view('admin.listkategori');
    });
});
Route::get('/admin/laporan', [ProdukRejectController::class, 'laporan']);

// Routes ADMIN CRUD Produk
Route::controller(ProdukController::class)
    ->prefix('/admin')
    ->group(function () {
        Route::get('/produk', 'index')->name('produk');
        Route::get('/produk/detail/{id}', 'show');
        Route::post('/tambah-produk', 'tambah')->name('tambah-produk');
        Route::get('/autocomplete-search', [TypeaheadController::class, 'autocompleteSearch']);
    });
// Routes Admin Input Product Reject
Route::get('/admin/produkreject', [ProdukRejectController::class, 'index']);
Route::post('/admin/produkreject', [ProdukRejectController::class, 'store']);


// Routes CRUD Supplier
Route::controller(SupplierController::class)->group(function () {
    Route::post('tambah-supplier', 'tambah');
    Route::put('update-supplier', 'update');
    Route::delete('delete-supplier', 'destroy');
    Route::prefix('/admin')
        ->group(function () {
            Route::get('/supplier', 'index')->name('supplier');
            Route::get('/edit-supplier/{id}', 'edit');
            Route::get('/supplier/detail/{id}', 'show');
        });
});





// ROUTES UNTUK ROLE KASIR
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

    Route::get('/produk', function () {
        return view('Kasir.daftarproduk');
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
