<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController; 

Route::get('/', function () {
    return view('signin');
})->name('sign-in');

Route::get('sign-up', function () {
    return view('signup');
})->name('sign-up');

//middleware to protect routes
// Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return view('base.base');
    })->name('dashboard');
    
    Route::post('register', [AuthUserController::class, 'register'])->name('register');
    Route::post('login', [AuthUserController::class, 'login'])->name('login');
    Route::resource('students', StudentController::class);
    Route::resource('employees', EmployeeController::class); 
// });

Route::post('/logout', [AuthUserController::class, 'destroy'])->name('logout');