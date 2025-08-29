<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassController extends Controller
{

    public function createClass()
    {
        return view('class.create');
    }

    public function store(Request $request)
    { 
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'nic_number' => 'required|string|max:20|unique:students',
            'username' => 'required|string|max:100|unique:students',
            'email' => 'required|string|email|max:255|unique:students',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'nic_number' => $request->nic_number,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Send email to admin
        Mail::raw("New student registered: {$student->first_name} {$student->last_name} ({$student->username})", function ($message) {
            $message->to('kavishkachamuditha562@gmail.com')->subject('New Student Registration');
        });

        // Log the student in
        auth()->guard('student')->login($student);

        return redirect()->route('dashboard'); // or wherever you want
    }
}
