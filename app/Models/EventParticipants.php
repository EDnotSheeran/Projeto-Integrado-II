<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\user;

class EventParticipants extends Model
{
    use HasFactory;

    protected $table = 'event_participants';

    protected $fillable = [
        'event_id',
        'user_id',
        'checked_in_at',
        'checked_out_at'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
