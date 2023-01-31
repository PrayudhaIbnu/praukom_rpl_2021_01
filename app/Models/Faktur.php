<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    use HasFactory;
    protected $table = "faktur";
    protected $primaryKey = "id_faktur";
    protected $fillable = [
        'id_faktur',
        'penjualan',
        'jml_tunai',
        'jml_kembalian',
        'grand_total',
        'kasir'
    ];
    public $timestamps = false;
}
