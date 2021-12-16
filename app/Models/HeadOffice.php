<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadOffice extends Model
{
    use HasFactory;

    protected $table = 'head_office';

    protected $fillable = [
        'name',
        'description',
        'address_id'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function employees()
    {
        return $this->hasMany(User::class);
    }
}
