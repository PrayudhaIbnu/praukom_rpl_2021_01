<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogProduk extends Model
{
    use HasFactory;
    protected $table = "log_produk";
    protected $fillable = [
        'id',
        'tanggal',
        'nama_user',
        'aktivitas',
        'nama_produk',
        'jumlah'
    ];
    public $timestamps = false;
}
