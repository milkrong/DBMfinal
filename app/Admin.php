<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    public $timestamps = false;

    protected $table = 'administrators';

    protected $guard = 'admin';

    protected $fillable = [
        'firstname', 'lastname', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
