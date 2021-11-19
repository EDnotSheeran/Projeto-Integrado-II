<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'street',
        'number',
        'uf',
        'city',
        'district',
        'complement',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
