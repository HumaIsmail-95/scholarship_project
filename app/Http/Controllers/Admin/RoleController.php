<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Services\admin\RoleService;
use App\Services\admin\PermissionService;
use App\Http\Requests\admin\RoleRequest;
use App\Http\Requests\admin\AttachPermissionRequest;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:list-role', ['only' => ['index']]);
        $this->middleware('permission:create-role', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-role', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-role', ['only' => ['destroy']]);
        // $this->middleware('permission:attach-permissions', ['only' => ['']]);
        $this->middleware('permission:role-permissions|attach-permissions', ['only' => ['attachPermissions', 'rolePermissions']]);
        $this->middleware('permission:revoke-permission', ['only' => ['revokePermission']]);
    }
    public function index()
    {
        $roles = RoleService::getRoles();
        return view('admin.pages.roles.index', compact('roles'));
    }

    public function store(RoleRequest $request)
    {
        try {
            $role_response = RoleService::store($request);
            return $role_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function update(RoleRequest $request, Role $role)
    {
        try {
            $role_response = RoleService::update($request, $role);
            return $role_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function destroy($id)
    {
        try {
            $role_response = RoleService::destroy($id);
            return $role_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function rolePermissions($role)
    {
        try {
            $role = Role::findorFail($role);
            if ($role) {
                $allPermissions = Permission::all();
                $permissions = $allPermissions->diff($role->permissions);
            }
            $role_permissions = $role->permissions()->paginate(5);
            return view('admin.pages.roles.rolePermission', compact('role', 'permissions', 'role_permissions'));
        } catch (\Throwable $th) {
            // return redirect()->back()->with('error', $th->getMessage());
            return $th;
        }
    }
    public function attachPermissions(AttachPermissionRequest $request, Role $role)
    {
        try {
            $role_response = RoleService::attachPermissions($request, $role);
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function revokePermission(Role $role, Permission $permission)
    {
        try {
            //code...
            $role_response = RoleService::revokePermission($role, $permission);
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
}
