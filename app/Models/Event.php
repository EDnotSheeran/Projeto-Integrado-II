<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $fillable = [
        'name',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'speaker_name',
        'available_vagancies',
        'description',
        'status',
        'method',
        'image_url',
        'certification_id',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'status' => 'boolean',
        'method' => 'boolean',
    ];

    public function certification()
    {
        return $this->hasOne(Certification::class);
    }
}
