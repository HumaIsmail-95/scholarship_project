<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AttachRoleRequest;
use App\Services\admin\PermissionService;
use App\Http\Requests\AttachPermissionRequest;
use App\Http\Requests\admin\PermissionRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:list-permission', ['only' => ['index']]);
        $this->middleware('permission:create-permission', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-permission', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-permission', ['only' => ['destroy']]);
        $this->middleware('permission:attach-role|permission-roles', ['only' => ['permissionRoles', 'attachRole']]);
        $this->middleware('permission:revoke-role', ['only' => ['revokeRole']]);
    }
    public function index()
    {
        $permissions = PermissionService::getPermissions();
        return view('admin.pages.permissions.index', compact('permissions'));
    }

    public function store(PermissionRequest $request)
    {
        try {
            $permission_response = PermissionService::store($request);
            return $permission_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function update(PermissionRequest $request, Permission $permission)
    {
        try {
            $permission_response = PermissionService::update($request, $permission);
            return $permission_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function destroy($id)
    {
        try {
            $permission_response = PermissionService::destroy($id);
            return $permission_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function permissionRoles(Permission $permission)
    {
        try {
            $roles = PermissionService::getRolePermission($permission);
            $permission_roles  = $permission->roles()->paginate(5);
            return view('admin.pages.permissions.permissionRole', compact('permission', 'roles', 'permission_roles'));
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function attachRole(AttachRoleRequest $request, Permission $permission)
    {
        try {
            $response = PermissionService::attachRole($request, $permission);
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function revokeRole(Permission $permission, Role $role)
    {
        try {
            $response = PermissionService::revokeRole($permission, $role);
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
}
