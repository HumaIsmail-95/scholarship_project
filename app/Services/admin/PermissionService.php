<?php

namespace App\Services\admin;

// use App\Models\Permission;

use App\Http\Requests\admin\AttachRoleRequest;
use App\Http\Requests\admin\PermissionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\AttachPermissionRequest;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionService
{
    public static function getPermissions()
    {

        $permissions = Permission::orderBy('id', 'DESC')->paginate(20);
        return $permissions;
    }
    public static function getRolePermission($permission)
    {
        Permission::findorFail($permission->id);
        if ($permission) {
            $allRoles = Role::all();
            $roles = $allRoles->diff($permission->roles);
        }
        return $roles;
    }
    public  static function store($request)
    {

        DB::beginTransaction();
        $data = $request->validated();

        $permission = Permission::create($data);
        DB::commit();
        $response = ['status' => true, 'message' => 'Permission added successfully.', 'permission' => $permission];

        return $response;
    }


    public static function update(PermissionRequest $request, Permission $permission)
    {
        DB::beginTransaction();
        $data = $request->validated();

        $permission->update($data);
        DB::commit();
        $response = ['status' => true, 'message' => ' Permission updated successfully.', 'permission' => $permission];
        return $response;
    }
    public static function destroy($id)
    {
        DB::beginTransaction();
        $permission = Permission::findorFail($id);
        $permission->delete();
        DB::commit();
        $response = ['status' => true, 'message' => 'Permission removed successfully.'];
        return $response;
    }


    public static function attachRole(AttachRoleRequest $request, Permission $permission)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $permission->assignRole($request->role);
        DB::commit();
        Session::flash('icon', 'success');
        Session::flash('heading', 'Success');
        Session::flash('message', 'Role attached succesfully');
        $response = ['status' => true, 'message' => 'Role attached succesfully.', 'permission' => $permission];
        return $response;
    }
    public static function revokeRole(Permission $permission, Role $role)
    {
        DB::beginTransaction();
        $permission->removeRole($role);
        DB::commit();
        Session::flash('icon', 'success');
        Session::flash('heading', 'Success');
        Session::flash('message', 'Role revoked succesfully');
        $response = ['status' => true, 'message' => 'Role revoked succesfully.', 'role' => $role];
        return $response;
    }
}
