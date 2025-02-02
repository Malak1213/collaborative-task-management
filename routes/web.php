<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes();

// Home Route (Redirects to Dashboard)
Route::get('/home', function () {
    return redirect()->route('dashboard');
});

// Protected Routes (Requires Authentication)
Route::middleware(['auth'])->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
