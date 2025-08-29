<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'student_id',
        'class_id',
        'subscription_status',
    ];
}