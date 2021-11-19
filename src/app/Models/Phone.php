<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
