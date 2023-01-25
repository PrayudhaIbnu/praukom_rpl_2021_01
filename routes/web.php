<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\HistoryController;
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

// ROUTES Super Admin
Route::middleware('auth')->group(function () {
    Route::controller(SuperAdminController::class)->group(function () {
        Route::get('/superadmin/kelolaakun', 'index')->name('superadmin');
        Route::post('tambah-user', 'store');
        Route::get('/superadmin/edit-user/{id}', 'edit');
        Route::put('update-user',  'update');
        Route::delete('delete-user',  'destroy');
    });
    // });

    // ROUTES UNTUK ROLE ADMIN
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });
    });
});

// untuk role admin history
Route::get('/admin/history/barang-keluar', [HistoryController::class, 'historybarangkeluar']);
Route::get('/admin/history/barang-masuk', [HistoryController::class, 'historybarangmasuk']);
// Routes ADMIN CRUD Produk
Route::controller(ProdukController::class)
    ->prefix('/admin')
    ->middleware('auth')
    ->group(function () {
        // CRUD PRODUK
        Route::get('/produk', 'index')->name('produk');
        Route::post('/tambah-produk', 'store')->name('tambah-produk');
        Route::get('/edit-produk/{id}', 'edit');
        Route::put('update-produk',  'update');
        Route::delete('delete-produk',  'destroy');

        // input stok
        Route::get('/inputstok', 'indexStok');
        Route::get('/produk/detail/{id}', 'show');
        Route::post('/tambah-stok', 'produkMasuk')->name('tambah-stok');
        Route::get('/produkreject', 'indexprodukreject');
        Route::post('/input-produkreject', 'storeprodukreject');
        Route::get('/autocomplete-search', [TypeaheadController::class, 'autocompleteSearch']);
        // Produk

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

Route::controller(LaporanController::class)->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', 'dashboardAdmin');
        Route::get('/laporan', 'indexAdmin');
    });
});

// Pengennya ni routes bisa dipake role admin sama pengawas 
Route::controller(LaporanController::class)->group(function () {
    Route::post('/cetaklaporan-harian', 'cetakHarian')->name('cetak-harian');
    Route::post('/cetaklaporan-mingguan', 'cetakMingguan')->name('atur-tanggal');
    Route::post('/cetaklaporan-bulanan', 'cetakBulanan')->name('atur-tanggal-bulanan');
});

// ROUTES UNTUK ROLE KASIR
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
        Route::get('/laporan', 'laporanTransaksi');
        Route::get('/produk', 'indexProduk');
        Route::get('/search', 'search')->name('search.kasir');
        Route::post('/getProduk', 'autocomplete')->name('autocomplete');
    });
});


// ROUTES UNTUK ROLE PENGAWAS
Route::controller(LaporanController::class)->group(function () {
    Route::prefix('/pengawas')->group(function () {
        Route::get('/dashboard', function () {
            return view('pengawas.index');
        });
        Route::get('/laporan', 'indexPengawas');
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
});
// });
