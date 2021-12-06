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
        'date',
        'start_time',
        'end_time',
        'speaker_name',
        'available_vacancies',
        'description',
        'status',
        'method',
        'image_url',
        'certification_id',
        'address_id',
    ];

    protected $casts = [
        'date' => 'date',
        'status' => 'boolean',
        'method' => 'boolean',
    ];

    public function certification()
    {
        return $this->belongsTo(Certification::class, 'certification_id', 'id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function getDateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    public function setDateAttribute($value)
    {
        if (is_string($value)) {
            $y = substr($value, 6);
            $m = substr($value, 3, -5);
            $d = substr($value, 0, -8);
            $this->attributes['date'] = date('Y-m-d', strtotime($y . '-' . $m . '-' . $d));
        } else {
            $this->attributes['date'] = $value;
        }
    }
}
