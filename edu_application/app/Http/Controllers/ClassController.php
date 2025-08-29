<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;

class ClassController extends Controller
{
    public function createClass()
    {
        return view('class.create');
    }

    public function storeClass(Request $request)
    {
        $request->validate([
            'grade'      => 'required|string|max:255',
            'subject'    => 'required|string|max:255',
            'teacher'    => 'required|string|max:255',
            'start_date' => 'required|date',
            'time'       => 'required|date_format:H:i',
        ]);

        // Store the class information in the database
        $class = SchoolClass::create([
            'grade'      => $request->grade,
            'subject'    => $request->subject,
            'teacher'    => $request->teacher,
            'start_date' => $request->start_date,
            'time'       => $request->time,
        ]);

        return redirect()->route('class.create')->with('success', 'Class added successfully!');
    }

    public function viewClasses()
    {
        // Fetch all classes from the database
        $classes = SchoolClass::all();

        // Pass data to the view
        return view('class.index', compact('classes'));
    }

}

