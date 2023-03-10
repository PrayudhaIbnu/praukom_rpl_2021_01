<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struk extends Model
{
    use HasFactory;
    protected $table = "struk";
    protected $primaryKey = "id_struk";
    protected $fillable = [
        'id_struk',
        'penjualan',
        'jml_tunai',
        'jml_kembalian',
        'grand_total',
        'kasir'
    ];
    public $timestamps = false;
}
