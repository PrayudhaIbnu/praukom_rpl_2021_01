<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = "produk";
    protected $fillable = [
        'id_produk',
        'kategori',
        'nama_produk',
        'stok',
        'satuan_produk',
        'harga_beli',
        'harga_jual',
        'foto',
        // 'supplier',
        // 'user'
    ];
    public $timestamps = false;   
}
