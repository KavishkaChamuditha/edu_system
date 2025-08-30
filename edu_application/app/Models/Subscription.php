<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\SchoolClass;

class Subscription extends Model
{
    protected $fillable = [
        'student_id',
        'class_id',
        'subscription_status',
    ];

    // Relationship: Subscription belongs to a student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // Relationship: Subscription belongs to a class
    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }
}
