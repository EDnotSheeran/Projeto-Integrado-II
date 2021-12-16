<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventParticipants;
use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $fillable = [
        'name',
        'time',
        'date',
        'duration',
        'start_datetime',
        'end_datetime',
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

    public function getDateAttribute($value)
    {

        return date('d/m/Y', strtotime($value));
    }

    public function getTimeAttribute($value)
    {
        return date('H:i', strtotime($value));
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
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

    public function setTimeAttribute($value)
    {
        if (is_string($this->attributes['date'])) {
            $this->attributes['start_datetime'] = date('Y-m-d H:i:s', strtotime($this->attributes['date'] . ' ' . $value));
            $this->attributes['end_datetime'] = Carbon::parse(date('Y-m-d H:i:s', strtotime($this->attributes['date'] . ' ' . $value)))->addHours($this->attributes['duration']);
        } else {
            $this->attributes['start_datetime'] = date('Y-m-d H:i:s', strtotime($this->attributes['date']->format('Y-m-d') . ' ' . $value));
            Carbon::parse($this->attributes['end_datetime'] = date('Y-m-d H:i:s', strtotime($this->attributes['date']->format('Y-m-d') . ' ' . $value)))->addHours($this->attributes['duration']);
        }
        $this->attributes['time'] = $value;
    }

    public function getEventParticipants()
    {
        return $this->hasMany(EventParticipants::class, 'event_id', 'id');
    }

    function participants()
    {
        return $this->hasMany(EventParticipants::class, 'event_id', 'id');
    }

    public function getEventParticipantsCountAttribute()
    {
        return $this->getEventParticipants()->count();
    }

    public function getAllAvailableVacanciesAttribute()
    {
        return $this->attributes['available_vacancies'] - $this->getEventParticipantsCountAttribute();
    }

    public function getIsUserParticipatingAttribute()
    {
        return $this->getEventParticipants()->where('user_id', auth()->user()->id)->count() > 0;
    }
}
