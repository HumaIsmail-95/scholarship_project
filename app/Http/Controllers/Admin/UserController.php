<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UserRequest;
use Illuminate\Http\Request;
use App\Services\admin\UserService;

class UserController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:list-permission', ['only' => ['index']]);
        // $this->middleware('permission:create-permission', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-permission', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-permission', ['only' => ['destroy']]);
        // $this->middleware('permission:attach-role|permission-roles', ['only' => ['permissionRoles', 'attachRole']]);
        // $this->middleware('permission:revoke-role', ['only' => ['revokeRole']]);
    }
    public function index()
    {
        $users = UserService::getUsers();
        return view('admin.pages.users.index', compact('users'));
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
    public function update(UserRequest $request, Role $role)
    {
        try {
            $role_response = UserService::update($request, $role);
            return $role_response;
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
}
