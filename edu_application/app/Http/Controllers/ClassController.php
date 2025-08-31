<?php
namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Subscription;
use Illuminate\Http\Request;

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

    // Update class
    public function updateClass(Request $request, $id)
    {
        $request->validate([
            'grade'      => 'required|string|max:255',
            'subject'    => 'required|string|max:255',
            'teacher'    => 'required|string|max:255',
            'start_date' => 'required|date',
            'time'       => 'required|string',
        ]);

        $class             = SchoolClass::findOrFail($id);
        $class->grade      = $request->input('grade');
        $class->subject    = $request->input('subject');
        $class->teacher    = $request->input('teacher');
        $class->start_date = $request->input('start_date');
        $class->time       = $request->input('time');
        $class->save();

        return redirect()->back()->with('success', 'Class updated successfully.');
    }

    // Delete class
    public function deleteClass($id)
    {
        $class = SchoolClass::findOrFail($id);
        $class->delete();

        return redirect()->back()->with('success', 'Class deleted successfully.');
    }

    public function subscribe($id)
    {
        $studentId = auth()->guard('student')->id(); // Make sure student is logged in

        if (! $studentId) {
            return redirect()->route('dashboard')->with('error', 'Please login first!');
        }

        // Prevent duplicate subscriptions
        $exists = Subscription::where('student_id', $studentId)
            ->where('class_id', $id)
            ->exists();

        if ($exists) {
            return redirect()->route('dashboard')->with('info', 'You are already subscribed to this class.');
        }

        Subscription::create([
            'student_id'          => $studentId,
            'class_id'            => $id,
            'subscription_status' => 1, // Active
        ]);

        return redirect()->route('dashboard')->with('success', 'Class added successfully!');
    }

    // unsubscribe classs function
    public function unsubscribe($id)
    {
        $studentId    = auth()->guard('student')->id();
        $subscription = Subscription::where('student_id', $studentId)
            ->where('class_id', $id)
            ->where('subscription_status', 1)
            ->first();

        if ($subscription) {
            $subscription->delete();
            return back()->with('success', 'Unsubscribed successfully!');
        }

        return back()->with('error', 'Subscription not found.');
    }

}
