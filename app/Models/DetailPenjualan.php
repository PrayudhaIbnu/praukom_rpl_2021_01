<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $table = "detail_penjualan";
    // protected $primaryKey = "id_supplier";
    protected $fillable = [
        'produk',
        'penjualan',
        'qty',
        'sub_total_hrg'
    ];
    public $timestamps = false;
}
