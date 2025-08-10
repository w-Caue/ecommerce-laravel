<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable
{
    protected $guard = 'customer';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'image',
    ];

    protected $hidden = [
        'password',
    ];
}
