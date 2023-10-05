<?php

use App\Http\Controllers\Website\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\FrontendController;
use App\Http\Controllers\Website\MyApplicationsController;



Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/all-courses', [FrontendController::class, 'allCourses'])->name('allCourses'); //getting all disciplines

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/my-uni-app', [DashboardController::class, 'myUniApp'])->name('myUniApp');
    Route::post('/personal-info/{user}', [DashboardController::class, 'personalInfo'])->name('personalInfo');
    Route::post('/professional-exp/{user}', [DashboardController::class, 'professionalExp'])->name('professionalExp');
    Route::post('/test-lnguage/{user}', [DashboardController::class, 'testLanguage'])->name('testLanguage');
    Route::post('/store-documents/{user}', [DashboardController::class, 'storeDocuments'])->name('storeDocuments');

    Route::get('/my-applications', [MyApplicationsController::class, 'myApplications'])->name('myApplications');
});
