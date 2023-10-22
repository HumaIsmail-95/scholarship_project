<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DegreeController;
use App\Http\Controllers\Admin\DisciplineController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\StripeSettingController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StudyModelController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\SubscriptionPackage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/sends', function () {
    return view('website.pages.mails.application_sent');
});


// 'role:admin', 'role:superAdmin',
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    //profile
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::put('profile/{id}', [UserController::class, 'profileUpdate'])->name('profileUpdate');

    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // role
    Route::resource('roles', RoleController::class);
    Route::get('role-permission/{role}', [RoleController::class, 'rolePermissions'])->name('role.permissions');
    Route::post('role-permission/{role}', [RoleController::class, 'attachPermissions'])->name('role.permissions');
    Route::delete('role-permission/{role}/{permission}', [RoleController::class, 'revokePermission'])->name('role.revoke.permission');
    // permision
    Route::resource('permissions', PermissionController::class);
    Route::get('permission/{permission}', [PermissionController::class, 'permissionRoles'])->name('permission.roles');
    Route::post('permission/{permission}', [PermissionController::class, 'attachRole'])->name('permission.roles');
    Route::delete('permission/{permission}/{role}', [PermissionController::class, 'revokeRole'])->name('permission.revoke.role');
    // users
    Route::resource('users', UserController::class);
    Route::get('users/{user}/roles-permissions', [UserController::class, 'userRolesPermissions'])->name('users.roles.permissions');
    Route::post('users/{user}/roles', [UserController::class, 'assignRole'])->name('users.assign.role');
    Route::delete('users/{user}/roles/{role}', [UserController::class, 'userRevokeRole'])->name('users.revoke.role');
    Route::post('users/{user}/permisisons', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('users/{user}/permissions/{permission}', [UserController::class, 'userRevokePermission'])->name('users.revoke.permission');

    // degrees
    Route::resource('degrees', DegreeController::class);
    // discipline
    Route::resource('disciplines', DisciplineController::class);
    // study-model
    Route::resource('study-models', StudyModelController::class);
    //universities
    Route::resource('universities', UniversityController::class);
    //courses
    Route::resource('courses', CourseController::class)->except(['show']);
    Route::get('courses/show/{course_id}', [CourseController::class, 'showCourse'])->name('courses.show');
    Route::get('courses/get-city', [CourseController::class, 'getCity'])->name('courses.getCity');
    Route::get('courses/get-university', [CourseController::class, 'getUniversity'])->name('courses.get-university');
    //subscription
    Route::resource('subscription-packages', SubscriptionController::class);
    //student
    Route::resource('students', StudentController::class);
    //blog
    Route::resource('blogs', BlogController::class);


    // settings
    //privacy policy
    Route::get('settings/privacy-policy', [SettingController::class, 'privacyPolicy'])->name('settings.privacy');
    Route::put('settings/privacy-policy/{setting}', [SettingController::class, 'updatePrivacy'])->name('settings.privacy.update');
    //contact us
    Route::get('settings/contact-us', [SettingController::class, 'contactUs'])->name('settings.contact');
    Route::put('settings/contact-us/{setting}', [SettingController::class, 'updateContact'])->name('settings.contact.update');
    //about us
    Route::get('settings/about-us', [SettingController::class, 'aboutUs'])->name('settings.abouUs');
    Route::put('settings/about-us/{setting}', [SettingController::class, 'updateAbout'])->name('settings.aboutUs.update');
    //banner
    Route::get('banners', [BannerController::class, 'getBanner'])->name('banners');
    Route::put('banners', [BannerController::class, 'update'])->name('banners.update');


    // stripe setting
    Route::get('stripe/setting', [StripeSettingController::class, 'index'])->name('stripe.setting.index');
    Route::put('stripe/setting', [StripeSettingController::class, 'update'])->name('stripe.setting.update');
    // subscription Testnig

    Route::get('subscription/testing', [StripeSettingController::class, 'testingEdit'])->name('subscription.testing');
    Route::put('subscription/testing/update', [StripeSettingController::class, 'testingUpdate'])->name('subscription.testing.update');
});
require __DIR__ . '/auth.php';
require __DIR__ . '/website.php';
