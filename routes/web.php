<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaAkunController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LogAktivitasController;

// DEFAULT ROUTES
// Route::get('/', function () {
//     return view('welcome');
// });

// ROUTES LOGIN
Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::controller(AuthController::class)->group(function () {
    Route::post('/auth', 'masuk');
    Route::post('/logout', 'keluar');
});
// END ROUTES LOGIN

// ROUTES UNTUK ROLE SUPER ADMIN
Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::controller(KelolaAkunController::class)->group(function () {
        Route::get('/superadmin/kelolaakun', 'index');
        Route::post('tambah-user', 'store');
        Route::get('/superadmin/edit-user/{id}', 'edit');
        Route::put('update-user',  'update');
        Route::put('update-password',  'updatePassword');
        Route::delete('delete-user',  'destroy');
    });
});
// END ROUTES SUPER ADMIN


// ROUTES UNTUK ROLE ADMIN
Route::middleware(['auth', 'admin'])->prefix('/admin')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'dashboardAdmin']);
    // PRODUK
    Route::controller(ProdukController::class)->group(function () {
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
        // listkategori
        Route::get('/listkategori', 'listkategori');
        Route::post('/tambah-kategori', 'tambahkategori');
        Route::get('/edit-kategori/{id}', 'editkategori');
        Route::put('update-kategori',  'updatekategori');
    });
    // RIWAYAT
    Route::controller(RiwayatController::class)->group(function () {
        Route::get('/riwayat/barang-masuk',  'AdminRiwayatBarangmasuk');
        Route::get('/riwayat/barang-keluar', 'AdminRiwayatBarangkeluar');
    });
    // CRUD SUPPLIER
    Route::controller(SupplierController::class)->group(function () {
        Route::get('/supplier', 'index')->name('supplier');
        Route::post('tambah-supplier', 'tambah');
        Route::get('/edit-supplier/{id}', 'edit');
        Route::put('update-supplier', 'update');
        Route::delete('delete-supplier', 'destroy');
        Route::get('/supplier/detail/{id}', 'show');
    });
    // LAPORAN
    Route::get('/laporan', [LaporanController::class, 'LaporanAdmin']);
});
// END ROUTES ADMIN


// ROUTES UNTUK ROLE KASIR
Route::middleware(['auth', 'kasir'])->group(function () {
    Route::prefix('/kasir')->group(function () {
        // dashboard kasir
        Route::get('/dashboard', [DashboardController::class, 'dashboardKasir']);
        // transaksi
        Route::controller(TransaksiController::class)->group(function () {
            Route::get('/transaksi', 'index');
            Route::post('/tambah-cart', 'addItem')->name('tambah-cart');
            Route::post('/tambah-qty', 'increaseItem')->name('tambah-qty');
            Route::post('/kurang-qty', 'decreaseItem')->name('kurang-qty');
            Route::post('/remove-cart', 'removeItem')->name('hapus-cart');
            Route::post('/checkout', 'handleSubmit')->name('transaksi');
            Route::get('/detail/transaksi/{id}', 'DetailTransaksi');
            Route::post('/getProduk', 'autocomplete')->name('autocomplete');
        });
        // riwayat transaksi
        Route::get('/riwayat/transaksi', [RiwayatController::class, 'KasirRiwayatTransaksi']);
        // index daftar produk
        Route::get('/produk', [ProdukController::class, 'KasirDaftarProduk']);
    });
});
// END ROUTES KASIR


// ROUTES UNTUK ROLE PENGAWAS
Route::middleware(['auth', 'pengawas'])->group(function () {
    Route::prefix('/pengawas')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboardPengawas']);
        Route::get('/laporan', [LaporanController::class, 'LaporanPengawas']);
        Route::get('/riwayat/barang-keluar', [RiwayatController::class, 'PengawasRiwayatBarangkeluar']);
        Route::get('/riwayat/barang-masuk', [RiwayatController::class, 'PengawasRiwayatBarangmasuk']);
        Route::get('/riwayat/transaksi', [RiwayatController::class, 'PengawasRiwayatTransaksi']);
        Route::get('/detail/transaksi/{id}', [TransaksiController::class, 'DetailTransaksi']);
        Route::get('/logproduk', [LogAktivitasController::class, 'logProduk']);
    });
});
// END ROUTES PENGAWAS


// ROUTES CETAK LAPORAN UNTUK ROLE ADMIN dan PENGAWAS
Route::middleware(['auth'])->group(function () {
    Route::controller(LaporanController::class)->group(function () {
        Route::post('/cetaklaporan-harian', 'cetakHarian')->name('cetak-harian');
        Route::post('/cetaklaporan-mingguan', 'cetakMingguan')->name('atur-tanggal');
        Route::post('/cetaklaporan-bulanan', 'cetakBulanan')->name('atur-tanggal-bulanan');
    });
});
// END ROUTES
