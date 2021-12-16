<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_Events extends Model
{
    use HasFactory;

    protected $table = 'users_events';

    protected $fillable = [
        'id_evento',
        'id_usuario',
        'situacao'
    ];
}
