<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = "supplier";
    protected $primaryKey = "id_supplier";
    protected $fillable = [
        'id_supplier',
        'foto_supplier',
        'nama_supplier',
        'alamat_supplier',
        'telp_supplier'
    ];
    public $timestamps = false;
}
