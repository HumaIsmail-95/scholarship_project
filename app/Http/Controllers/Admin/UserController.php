<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RoleRequest;
use App\Http\Requests\admin\UserPermissionRequest;
use App\Http\Requests\admin\UserRequest;
use App\Http\Requests\admin\UserRoleRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\admin\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:list-user', ['only' => ['index']]);
        $this->middleware('permission:create-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
        $this->middleware('permission:user-role-permission', ['only' => ['userRolesPermissions']]);
        $this->middleware('permission:assign-role', ['only' => ['assignRole']]);
        $this->middleware('permission:revoke-role', ['only' => ['userRevokeRole']]);
        $this->middleware('permission:assign-permisison', ['only' => ['givePermission']]);
        $this->middleware('permission:revoke-permisison', ['only' => ['userRevokePermission']]);
    }
    public function index()
    {
        $users = UserService::getUsers();
        $roles  = Role::all();
        return view('admin.pages.users.index', compact('users', 'roles'));
    }

    public function store(UserRequest $request)
    {
        try {
            $role_response = UserService::store($request);
            return $role_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function edit(User $user)
    {
        try {
            $roles  = Role::all();
            return view('admin.pages.users.edit', compact('user', 'roles'));
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
    public function update(UserRequest $request, User $user)
    {
        try {
            $role_response = UserService::update($request, $user);
            return redirect()->back()->with($role_response);
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function destroy($id)
    {
        try {
            $role_response = UserService::destroy($id);
            return $role_response;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function userRolesPermissions(User $user)
    {
        try {
            $roles = Role::all();
            $permissions = Permission::all();
            return view('admin.pages.users.roles_permissions', compact('user', 'roles', 'permissions'));
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function assignRole(User $user, UserRoleRequest $request)
    {
        try {
            UserService::assignRole($user, $request);
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
    public function userRevokeRole(User $user, Role $role)
    {
        try {
            UserService::revokeRole($user, $role);
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
    public function givePermission(User $user, UserPermissionRequest $request)
    {
        try {
            //code...
            UserService::givePermission($user, $request);
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
    public function userRevokePermission(User $user, Permission $permission)
    {
        try {
            //code...
            UserService::revokePermission($user, $permission);
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
    public function profile()
    {
        try {
            return view('admin.pages.profile.edit');
            //code...
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
    public function profileUpdate(Request $request, $id)
    {
        $user = User::findorFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'password' => 'required',
            'new_password' => 'required|string|min:8',
        ]);
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'The current password is incorrect.']);
        }
        if ($request->new_password != $request->password_confirmation) {
            return redirect()->back()->withErrors(['new_password' => 'The confimr password doesnot match']);
        }
        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['password'] = Hash::make($request->new_password);
        $user->update($data);
        return redirect()->back()->with(['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'profile updated successfully']);
    }
}
