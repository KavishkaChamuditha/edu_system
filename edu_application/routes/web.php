<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
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

// student registration routes
Route::get('student.register', [RegisteredUserController::class, 'create'])->name('student.register');
Route::post('student.add', [RegisteredUserController::class, 'store'])->name('student.add');



require __DIR__.'/auth.php';
