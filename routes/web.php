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


// ROUTES LOGIN
Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::controller(AuthController::class)->group(function () {
    Route::post('/auth', 'masuk');
    Route::post('/logout', 'keluar');
});
// END ROUTES LOGIN

// ROUTES UNTUK ROLE SUPER ADMIN
Route::middleware(['auth', 'level:Super Admin'])->group(function () {
    Route::controller(KelolaAkunController::class)->group(function () {
        Route::get('/kelolaakun', 'index')->name('kelolaakun');
        Route::post('tambah-user', 'store');
        Route::get('edit-user/{id}', 'edit');
        Route::put('update-user',  'update');
        Route::put('update-password',  'updatePassword');
        Route::delete('delete-user',  'destroy');
    });
});
// END ROUTES SUPER ADMIN

// ROUTES UNTUK ROLE ADMIN
Route::middleware(['auth', 'level:Admin'])->group(function () {
    // PRODUK
    Route::controller(ProdukController::class)->group(function () {
        // CRUD PRODUK
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
        Route::get('/kategori', 'kategori');
        Route::post('/tambah-kategori', 'tambahkategori');
        Route::get('/edit-kategori/{id}', 'editkategori');
        Route::put('update-kategori',  'updatekategori');
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
});
// END ROUTES ADMIN

// ROUTES UNTUK ROLE KASIR
Route::middleware(['auth', 'level:Kasir'])->group(function () {
    // transaksi
    Route::controller(TransaksiController::class)->group(function () {
        Route::get('/transaksi', 'index')->name('transaksi');
        Route::post('/tambah-cart', 'addItem')->name('tambah-cart');
        Route::post('/tambah-qty', 'increaseItem')->name('tambah-qty');
        Route::post('/kurang-qty', 'decreaseItem')->name('kurang-qty');
        Route::post('/remove-cart', 'removeItem')->name('hapus-cart');
        Route::post('/checkout', 'handleSubmit')->name('transaksi');
        Route::post('/getProduk', 'autocomplete')->name('autocomplete');
    });
});
// END ROUTES KASIR

// ROUTES UNTUK ROLE PENGAWAS
Route::get('/logproduk', [LogAktivitasController::class, 'logProduk'])->middleware(['auth', 'level:Pengawas']);
// END ROUTES PENGAWAS

// ROUTES DASHBOARD UNTUK ROLE ADMIN, KASIR, PENGAWAS 
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'level:Admin,Kasir,Pengawas']);

// ROUTES DAFTAR PRODUK UNTUK ROLE ADMIN DAN KASIR
Route::get('/daftar-produk', [ProdukController::class, 'index'])->middleware(['auth', 'level:Admin,Kasir']);

// ROUTES RIWAYAT BARANG MASUK DAN KELUAR UNTUK ROLE ADMIN DAN PENGAWAS
Route::controller(RiwayatController::class)->middleware(['auth', 'level:Admin,Pengawas'])->group(function () {
    Route::get('/riwayat/barang-masuk',  'RiwayatBarangmasuk');
    Route::get('/riwayat/barang-keluar', 'RiwayatBarangkeluar');
});

// ROUTES CETAK LAPORAN UNTUK ROLE ADMIN dan PENGAWAS
Route::middleware(['auth', 'level:Admin,Pengawas'])->group(function () {
    Route::controller(LaporanController::class)->group(function () {
        Route::get('/laporan', 'laporan');
        Route::post('/cetaklaporan-harian', 'cetakHarian')->name('cetak-harian');
        Route::post('/cetaklaporan-mingguan', 'cetakMingguan')->name('atur-tanggal');
        Route::post('/cetaklaporan-bulanan', 'cetakBulanan')->name('atur-tanggal-bulanan');
    });
});

// ROUTES RIWAYAT TRANSAKSI UNTUK ROLE KASIR DAN PENGAWAS
Route::get('/riwayat-penjualan', [RiwayatController::class, 'RiwayatPenjualan'])->middleware(['auth', 'level:Kasir,Pengawas']);

// ROUTES DETAIL TRANSAKSI UNTUK ROLE KASIR DAN PENGAWAS
Route::get('/struk/{id}', [TransaksiController::class, 'strukTransaksi'])->middleware(['auth', 'level:Kasir,Pengawas']);
