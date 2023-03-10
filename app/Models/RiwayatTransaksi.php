<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatTransaksi extends Model
{
    use HasFactory;
    protected $table = "riwayat_transaksi";
    protected $fillable = [
        'id_struk',
        'tanggal',
        'jam_jual',
        'nama'
    ];
    public $timestamps = false;
}
