<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
