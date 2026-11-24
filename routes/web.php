<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Welcome page: visitors see it, logged-in users go straight to the dashboard
Route::get('/', fn () => auth()->check() ? redirect()->route('dashboard') : view('welcome'))
    ->middleware('nocache')->name('welcome');

// Only for visitors who are NOT logged in
Route::middleware(['guest', 'nocache'])->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->middleware('throttle:20,1');

    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->middleware(['throttle:10,1', 'once']);
});

// Only for logged-in users
Route::middleware(['auth', 'nocache'])->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store')->middleware('once');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

    Route::post('/students/{student}/courses', [StudentController::class, 'storeCourse'])
        ->name('students.courses.store')->middleware('once');
});
