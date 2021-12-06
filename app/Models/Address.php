<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    protected $fillable = [
        'state',       // uf
        'street',     // rua
        'city',      // cidade
        'district', // bairro
        'zipcode', // cep
        'number', // numero
        'complement', // local
    ];

    public function event()
    {
        return $this->hasOne(Event::class);
    }
}
