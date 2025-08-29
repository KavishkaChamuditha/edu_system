<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassController;
use Illuminate\Support\Facades\Route;

// loading the login page
Route::get('/', function () {
    return redirect()->route('login');
});

// loding the dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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


// student registration routes
Route::get('student.register', [RegisteredUserController::class, 'create'])->name('student.register');
Route::post('student.add', [RegisteredUserController::class, 'store'])->name('student.add');

require __DIR__ . '/auth.php';
