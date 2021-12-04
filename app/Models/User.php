<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'registration_number',
        'cpf',
        'role',
        'job_id',
        'head_office_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public const ROLE = [
        1 => 'default',
        2 => 'admin'
    ];

    public static function getRoleID($role)
    {
        return array_search($role, self::ROLE);
    }

    public function getRoleAttribute()
    {
        return self::ROLE[$this->attributes['role']];
    }

    public function setRoleAttribute($value)
    {
        $roleID = self::getRoleID($value);
        if ($roleID) {
            $this->attributes['role'] = $roleID;
        }
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function headOffice()
    {
        return $this->belongsTo(HeadOffice::class);
    }
}
