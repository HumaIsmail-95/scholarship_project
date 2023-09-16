<?php

namespace App\Services\admin;

// use App\Models\Permission;
use App\Http\Requests\admin\PermissionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\AttachPermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionService
{
    public static function getPermissions()
    {

        $permissions = Permission::orderBy('id', 'DESC')->paginate(20);
        return $permissions;
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


    public static function storeAttachPermissions($request)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $permission = ModelsPermission::findOrFail($request->permission_id);

        $permission->syncPermissions($request->permissions);
        DB::commit();
        $response = ['status' => true, 'message' => 'Permission attached succesfully.', 'permission' => $permission];

        return $response;
    }
}
