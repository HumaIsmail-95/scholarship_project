<?php

namespace App\Services\admin;

// use App\Models\User;

use App\Http\Requests\admin\RoleRequest;
use App\Http\Requests\admin\UserPermissionRequest;
use App\Http\Requests\admin\UserRequest;
use App\Http\Requests\admin\UserRoleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserService
{
    public static function getRole()
    {
        return $roles = Role::all();
    }
    public static function getUsers()
    {

        $users = User::orderBy('id', 'DESC')->paginate(20);
        return $users;
    }
    // public static function editUser(User $user)
    // {

    // }
    public  static function store($request)
    {

        DB::beginTransaction();
        $data = $request->validated();
        $data['created_by'] = Auth::user()->id;
        $user = User::create($data);
        // $user->syncRoles($request->roles);
        foreach ($request->roles as $role) {
            $user->assignRole($role);
        }

        DB::commit();
        $response = ['status' => true, 'message' => 'User added successfully.', 'user' => $user];

        return $response;
    }


    public static function update(UserRequest $request, User $user)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $user->update($data);
        if ($request->roles) :
            $user->syncRoles($request->roles);
        endif;
        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => ' User updated successfully.', 'user' => $user];
        return $response;
    }
    public static function destroy($id)
    {
        DB::beginTransaction();
        $role = User::findorFail($id);
        $role->delete();
        DB::commit();
        $response = ['status' => true, 'message' => 'User removed successfully.'];
        return $response;
    }

    public static function assignRole(User $user, UserRoleRequest $request)
    {
        DB::beginTransaction();
        $request->validated();
        $icon = 'success';
        $heading = 'Success';
        $message = 'Role Assigned';
        if ($user->hasRole($request->role)) {
            $icon = 'error';
            $heading = 'Error';
            $message = 'Role Exists';
        } else {
            $user->assignRole($request->role);
        }
        DB::commit();
        Session::flash('icon', $icon);
        Session::flash('heading', $heading);
        Session::flash('message', $message);
        return;
    }
    public static function revokeRole(User $user, Role $role)
    {
        DB::beginTransaction();
        $icon = 'error';
        $heading = 'Error';
        $message = 'Role doesnot exists';
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            $icon = 'success';
            $heading = 'Success';
            $message = 'Role revoked successfully';
        }
        DB::commit();
        Session::flash('icon', $icon);
        Session::flash('heading', $heading);
        Session::flash('message', $message);
        return;
    }

    public static function givePermission(User $user, UserPermissionRequest $request)
    {
        DB::beginTransaction();
        if ($user->hasPermissionTo($request->permission)) {
            $icon = 'error';
            $heading = 'Error';
            $message = 'Permission exists';
        } else {
            $icon = 'success';
            $heading = 'Success';
            $message = 'Permission given successfully';
            $user->givePermissionTo($request->permission);
        }
        DB::commit();
        Session::flash('icon', $icon);
        Session::flash('heading', $heading);
        Session::flash('message', $message);
        return;
    }
    public static function revokePermission(User $user, Permission $permission)
    {
        DB::beginTransaction();
        $icon = 'error';
        $heading = 'Error';
        $message = 'Role doesnot exists';
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            $icon = 'success';
            $heading = 'Success';
            $message = 'Permission revoked successfully';
        }
        DB::commit();
        Session::flash('icon', $icon);
        Session::flash('heading', $heading);
        Session::flash('message', $message);

        DB::commit();
        return;
    }
}
