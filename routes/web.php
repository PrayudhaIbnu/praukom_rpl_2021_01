<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\HistoryController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\TransaksiController;


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

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/auth', 'masuk');
    Route::post('/logout', 'keluar');
});

// Route::group(['middleware' => ['auth']], function () {
//     Route::group(['middleware' => ['cekLevel:L01']], function () {
//         Route::resource('index', SuperAdminController::class);
//     });
//     Route::group(['middleware' => ['cekLevel:L02']], function () {
//         Route::resource('index', ProdukController::class);
//     });
//     Route::group(['middleware' => ['cekLevel:L03']], function () {
//         Route::resource('index', SuperAdminController::class);
//     });
//     Route::group(['middleware' => ['cekLevel:L03']], function () {
//         Route::resource('index', SuperAdminController::class);
//     });
// });



// ROUTES Super Admin
Route::group(['middleware' => ['auth']], function () {
    // Route::group(['middleware' => ['ceklevel:1']], function () {
    Route::controller(SuperAdminController::class)->group(function () {
        Route::get('/superadmin/kelolaakun', 'index')->name('superadmin');
        Route::post('tambah-user', 'store');
        Route::get('/superadmin/edit-user/{id}', 'edit');
        Route::put('update-user',  'update');
        Route::delete('delete-user',  'destroy');
    });
});
// });


// ROUTES UNTUK ROLE ADMIN
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });
        Route::get('/listkategori', function () {
            return view('admin.listkategori');
        });
    });
});
// });

// untuk role admin history
Route::get('/admin/history/barang-keluar', [HistoryController::class, 'historybarangkeluar']);
Route::get('/admin/history/barang-masuk', [HistoryController::class, 'historybarangmasuk']);
// Routes ADMIN CRUD Produk
Route::controller(ProdukController::class)
    ->prefix('/admin')
    ->group(function () {
        Route::get('/produk', 'index')->name('produk');
        Route::get('/inputstok', 'indexstok');
        Route::get('/produk/detail/{id}', 'show');
        Route::post('/tambah-stok', 'produkmasuk')->name('tambah-stok');
        Route::post('/tambah-produk', 'store')->name('tambah-produk');
        Route::get('/produkreject', 'indexprodukreject');
        Route::post('/input-produkreject', 'storeprodukreject');
        Route::get('/autocomplete-search', [TypeaheadController::class, 'autocompleteSearch']);
        // listkategori
        Route::get('/listkategori', 'listkategori');
        Route::post('/tambah-kategori', 'tambahkategori');
        Route::get('/edit-kategori/{id}', 'editkategori');
        Route::put('update-kategori',  'updatekategori');
    });



// Routes CRUD ADMIN Supplier
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
// });


// ROUTES UNTUK ROLE KASIR
Route::group(['middleware' => ['auth']], function () {
    Route::controller(TransaksiController::class)->group(function () {
        Route::prefix('/kasir')->group(function () {
            Route::get('/dashboard', function () {
                return view('kasir.dashboard');
            });
            Route::get('/transaksi', 'index');
            Route::post('/tambah-cart', 'addItem')->name('tambah-cart');
            Route::post('/tambah-qty', 'increaseItem')->name('tambah-qty');
            Route::post('/kurang-qty', 'decreaseItem')->name('kurang-qty');
            Route::post('/remove-cart', 'removeItem')->name('hapus-cart');
            Route::post('/checkout', 'handleSubmit')->name('transaksi');
            Route::get('/laporan', function () {
                return view('kasir.laporan');
            });

            Route::get('/produk', function () {
                return view('Kasir.daftarproduk');
            });
        });
    });
});



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
// });
