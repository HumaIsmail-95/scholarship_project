<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\DegreeController;
use App\Http\Controllers\admin\DisciplineController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\admin\StudyModelController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('welcome');
});


// 'role:admin', 'role:superAdmin',
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
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

    // degrees
    Route::resource('degrees', DegreeController::class);
    // discipline
    Route::resource('disciplines', DisciplineController::class);
    // study-model
    Route::resource('study-models', StudyModelController::class);
});
require __DIR__ . '/auth.php';
require __DIR__ . '/website.php';
