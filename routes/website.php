<?php

use App\Http\Controllers\Website\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\FrontendController;



Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/all-courses', [FrontendController::class, 'allCourses'])->name('allCourses'); //getting all disciplines

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/my-uni-app', [DashboardController::class, 'myUniApp'])->name('myUniApp');
    Route::post('/personal-info/{user}', [DashboardController::class, 'personalInfo'])->name('personalInfo');
});
