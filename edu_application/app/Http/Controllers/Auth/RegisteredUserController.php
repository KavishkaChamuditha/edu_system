<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'nic_number'    => 'required|string|max:20|unique:students',
            'username'      => 'required|string|max:100|unique:students',
            'email'         => 'required|string|email|max:255|unique:students',
            'password'      => 'required|string|confirmed|min:8',
        ]);

        $student = Student::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'nic_number'    => $request->nic_number,
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
        ]);

        // Send email to admin add your email to test the message
        Mail::raw("New student registered: {$student->first_name} {$student->last_name} ({$student->username})", function ($message) {
            $message->to('admin@gmail.com')->subject('New Student Registration');
        });

        return redirect()->route('login'); // sending user to login page
    }

}
