<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'cargo',
        'sede',
        'matricula',
        'cpf',
        'tipo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public const TIPOS = [
        1 => 'comum',
        2 => 'administrador'
    ];

    public static function getTipoID($tipo)
    {
        return array_search($tipo, self::TIPOS);
    }

    public function getRoleAttribute()
    {
        return self::TIPOS[$this->attributes['tipo']];
    }

    public function setTipoAttribute($value)
    {
        $tipoID = self::getTipoID($value);
        if ($tipoID) {
            $this->attributes['tipo'] = $tipoID;
        }
    }
}
