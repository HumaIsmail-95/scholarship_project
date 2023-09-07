<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\FrontendController;



Route::get('/', [FrontendController::class, 'index']);
