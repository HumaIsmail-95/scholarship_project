<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Website\PaymentStripeController;
use App\Http\Controllers\Website\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\FrontendController;
use App\Http\Controllers\Website\MyApplicationsController;
use App\Http\Controllers\Website\SubscriptionController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/all-courses', [FrontendController::class, 'allCourses'])->name('allCourses'); //getting all disciplines
Route::get('/all-degrees', [FrontendController::class, 'allDegrees'])->name('allDegrees'); //getting all disciplines
Route::get('/subscription-packages', [FrontendController::class, 'subscriptions'])->name('subscriptions');
Route::get('/programs', [FrontendController::class, 'programs'])->name('programs');
Route::get('/programs/{program}/program-details', [FrontendController::class, 'programDetails'])->name('programDetails');
Route::get('courses/get-city', [CourseController::class, 'getCity'])->name('courses.getCity');
Route::get('courses/get-university', [CourseController::class, 'getUniversity'])->name('courses.get-university');
Route::get('/universities/{university}/university-details', [FrontendController::class, 'universityDetail'])->name('university-detail');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/privacy', [FrontendController::class, 'privacy'])->name('privacy');
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{blog}', [FrontendController::class, 'blogDetail'])->name('blogDetail');

Route::middleware(['auth', 'website'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/update-profile/{id}', [DashboardController::class, 'updateProfile'])->name('updateProfile');

    Route::get('/my-uni-app', [DashboardController::class, 'myUniApp'])->name('myUniApp');
    Route::post('/personal-info/{user}', [DashboardController::class, 'personalInfo'])->name('personalInfo');
    Route::post('/professional-exp/{user}', [DashboardController::class, 'professionalExp'])->name('professionalExp');
    Route::delete('/education-exp/{educationId}', [DashboardController::class, 'deleteEducationRecord'])->name('deleteEducationRecord');

    Route::post('/test-lnguage/{user}', [DashboardController::class, 'testLanguage'])->name('testLanguage');
    Route::post('/store-documents/{user}', [DashboardController::class, 'storeDocuments'])->name('storeDocuments');

    Route::get('/my-applications', [MyApplicationsController::class, 'myApplications'])->name('myApplications');
    Route::get('/review-my-application/{program}', [MyApplicationsController::class, 'reviewApplication'])->name('reviewApplication');
    Route::get('/finalize-my-application/{program}', [MyApplicationsController::class, 'finalizeApplication'])->name('finalizeApplication');
    Route::post('/finalize-my-application/{program}', [MyApplicationsController::class, 'submiteApplication'])->name('submiteApplication');
    Route::get('/overviews', [MyApplicationsController::class, 'overviews'])->name('overviews');
    //
    Route::post('stripe', [PaymentStripeController::class, 'stripePost'])->name('stripePost');
    // Route::get('/add-subscription', [SubscriptionController::class, 'addSubscription'])->name('addSubcription');
});
