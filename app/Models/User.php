<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    public static $createRules = [
        'name' => 'required',
        'gender' => 'required',
    ];
    
    public static $updateRules = [
        'name' => 'required',
        'gender' => 'required',
    ];

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'phone',
        'gender',
        'dob',
        'dead',
        'dod'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'dob' => 'datetime',
        'dead' => 'boolean',
        'dod' => 'datetime',
    ];
}
