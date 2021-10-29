<?php

namespace App\Models;

use App\Models\Address;
use App\Models\Phone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    // Relacionamento com a tabela de endereços
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    // Relacionamento com a tabela de telefones
    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
