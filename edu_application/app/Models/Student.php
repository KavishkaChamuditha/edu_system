<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'nic_number',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
