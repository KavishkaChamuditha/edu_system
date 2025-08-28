<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Specify the authentication guard for admin
    protected $guard = 'admin';

    // Mass assignable attributes
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Hidden attributes (not returned in arrays or JSON)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Cast attributes (optional)
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
