<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Subscription;

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

    // Relationship: Student has many subscriptions
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'student_id');
    }
}
 