<?php

use App\Http\Controllers\Website\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\FrontendController;



Route::get('/', [FrontendController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/my-uni-app', [DashboardController::class, 'myUniApp'])->name('myUniApp');
});
