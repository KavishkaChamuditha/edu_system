<?php
namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    // load students
    public function Students()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // API List all students and their subscriptions in JSON format
    public function studentsWithSubscriptions()
    {
        $students = Student::with(['subscriptions.class'])->get();

        return response()->json($students);
    }

    // View Show students and their subscriptions
    public function subscriptionsView()
    {
        $students = Student::with(['subscriptions.class'])->get();
        return view('students.subscriptions', compact('students'));
    }

}
