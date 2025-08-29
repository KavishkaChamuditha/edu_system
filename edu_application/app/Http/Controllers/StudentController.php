<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;

class StudentController extends Controller
{
    //load students
    public function Students()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }
}
  