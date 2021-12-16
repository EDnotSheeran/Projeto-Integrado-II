<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $table = 'certification';

    protected $fillable = [
        'title',
        'content',
        'image_url'
    ];

    public function event()
    {
        return $this->hasOne(Event::class);
    }
}
