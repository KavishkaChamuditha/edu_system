<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// loading the login page
Route::get('/', function () {
    return redirect()->route('login');
});

// loding the dashboard
Route::get('/dashboard', [AuthenticatedSessionController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// loading the profile pagees
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// login page routes
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);

// admin login
// Admin login form
Route::get('admin/login', [AuthenticatedSessionController::class, 'adminCreate'])
    ->name('admin.login');

// Admin login submission
Route::post('admin/login', [AuthenticatedSessionController::class, 'adminStore'])
    ->name('admin.login.check');

// Admin dashboard (auth middleware)
Route::middleware('auth:admin')->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::post('admin/logout', [AuthenticatedSessionController::class, 'admindestroy'])->name('admin.logout');
});

// class CRUD start from here
Route::get('add.class', [ClassController::class, 'createClass'])->name('class.create');
Route::post('classes.store', [ClassController::class, 'storeClass'])->name('classes.store');
Route::get('/classes', [ClassController::class, 'viewClasses'])->name('classes.index');
Route::put('/update.classes/{id}', [ClassController::class, 'updateClass'])->name('classes.update');
Route::delete('/delete.classes/{id}', [ClassController::class, 'deleteClass'])->name('classes.destroy');

Route::get('/students', [StudentController::class, 'Students'])->name('students.index');
Route::get('/students/subscriptions', [StudentController::class, 'subscriptionsView'])->name('students.subscriptions');
Route::post('/class/{id}/subscribe', [ClassController::class, 'subscribe'])->name('class.subscribe');
Route::delete('/class/{id}/unsubscribe', [ClassController::class, 'unsubscribe'])->name('class.unsubscribe');

// student registration routes
Route::get('student.register', [RegisteredUserController::class, 'create'])->name('student.register');
Route::post('student.add', [RegisteredUserController::class, 'store'])->name('student.add');

Route::get('/api/students/subscriptions', [StudentController::class, 'studentsWithSubscriptions']);

require __DIR__ . '/auth.php';
