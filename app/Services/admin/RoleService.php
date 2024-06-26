<?php

namespace App\Services\admin;

// use App\Models\Role;
use App\Http\Requests\admin\RoleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\admin\AttachPermissionRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class RoleService
{
    public static function getRoles()
    {

        $roles = Role::whereNotIn('name', ['superAdmin'])->orderBy('id', 'DESC')->paginate(20);
        return $roles;
    }

    public  static function store($request)
    {

        DB::beginTransaction();
        $data = $request->validated();

        $role = Role::create($data);
        DB::commit();
        $response = ['status' => true, 'message' => 'Role added successfully.', 'role' => $role];

        return $response;
    }


    public static function update(RoleRequest $request, Role $role)
    {
        DB::beginTransaction();
        $data = $request->validated();

        $role->update($data);
        DB::commit();
        $response = ['status' => true, 'message' => ' Role updated successfully.', 'role' => $role];
        return $response;
    }
    public static function destroy($id)
    {
        DB::beginTransaction();
        $role = Role::findorFail($id);
        $role->delete();
        DB::commit();
        $response = ['status' => true, 'message' => 'Role removed successfully.'];
        return $response;
    }


    public static function attachPermissions(AttachPermissionRequest $request, Role $role)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $role->givePermissionTo($request->permission);
        DB::commit();
        Session::flash('icon', 'success');
        Session::flash('heading', 'Success');
        Session::flash('message', 'Permission attached succesfully');
        $response = ['status' => true, 'message' => 'Permission attached succesfully.', 'role' => $role];
        return $response;
    }
    public static function revokePermission(Role $role, Permission $permission)
    {
        DB::beginTransaction();
        $role->revokePermissionTo($permission);

        DB::commit();
        Session::flash('status', true);
        Session::flash('icon', 'success');
        Session::flash('heading', 'Success');
        Session::flash('message', 'Permission revoked succesfully');
        $response = ['status' => true, 'message' => 'Permission revoked succesfully.', 'role' => $role];
        return $response;
    }
}
