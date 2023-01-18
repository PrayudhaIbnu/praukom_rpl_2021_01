<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelUser extends Model
{
    use HasFactory;
    protected $table = "level_user";
    protected $primaryKey = 'id_level';
    public $timestamp = false;
    protected $fillable = [
        'id_level',
        'nama_level'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'level', 'id_level');
    }
}
