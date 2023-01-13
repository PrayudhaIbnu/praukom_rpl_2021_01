<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = "barang_keluar";
    protected $fillable = [
        'produk',
        'qty',
        'tanggal_keluar',
        'keterangan'
    ];
    public $timestamps = false;
}
