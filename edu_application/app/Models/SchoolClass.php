<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    // Correct table name
    protected $table = 'classes';

    protected $fillable = [
        'grade',
        'subject',
        'teacher',
        'start_date',
        'time',
    ];

    protected $casts = [
        'start_date' => 'date',
        'time' => 'datetime:H:i',
    ];
}
