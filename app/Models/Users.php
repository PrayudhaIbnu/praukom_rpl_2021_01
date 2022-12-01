<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Users extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'id_user',
        'nama',
        'username',
        'password',
        'foto',
        'level'
    ];

    // public function level_user(): BelongsTo
    // {
    //     return $this->belongsTo()
    // }
}
