<?php

namespace App\Services\admin;

// use App\Models\Role;
use App\Http\Requests\admin\RoleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\AttachPermissionRequest;
use Spatie\Permission\Models\Role;

class RoleService
{
    public static function getRoles()
    {

        $roles = Role::orderBy('id', 'DESC')->paginate(20);
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


    public static function storeAttachPermissions($request)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $role = ModelsRole::findOrFail($request->role_id);

        $role->syncPermissions($request->permissions);
        DB::commit();
        $response = ['status' => true, 'message' => 'Permission attached succesfully.', 'role' => $role];

        return $response;
    }
}
