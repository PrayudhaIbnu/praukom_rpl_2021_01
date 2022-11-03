<?php

use Illuminate\Support\Facades\Route;

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

Route::get('auth/', function () {
    return view('auth.login');
});

// ROUTES UNTUK ROLE ADMIN
Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/produk', function () {
        return view('admin.daftarproduk');
    });
    
});

// ROUTES UNTUK ROLE KASIR
Route::prefix('/kasir')->group(function () {
    Route::get('/dashboard', function () {
        return view('kasir.dashboard');
    });
});

// ROUTES UNTUK ROLE PENGAWAS