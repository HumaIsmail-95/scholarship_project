<?php

namespace App\Services\admin;

// use App\Models\User;
use App\Http\Requests\admin\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserService
{
    public static function getUsers()
    {

        $users = User::orderBy('id', 'DESC')->paginate(20);
        return $users;
    }

    public  static function store($request)
    {

        DB::beginTransaction();
        $data = $request->validated();

        $role = User::create($data);
        DB::commit();
        $response = ['status' => true, 'message' => 'User added successfully.', 'role' => $role];

        return $response;
    }


    public static function update(UserRequest $request, User $role)
    {
        DB::beginTransaction();
        $data = $request->validated();

        $role->update($data);
        DB::commit();
        $response = ['status' => true, 'message' => ' User updated successfully.', 'role' => $role];
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


    public static function attachPermissions(AttachPermissionRequest $request, User $role)
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
    public static function revokePermission(User $role, Permission $permission)
    {
        DB::beginTransaction();
        $role->revokePermissionTo($permission);

        DB::commit();
        Session::flash('icon', 'success');
        Session::flash('heading', 'Success');
        Session::flash('message', 'Permission revoked succesfully');
        $response = ['status' => true, 'message' => 'Permission revoked succesfully.', 'role' => $role];
        return $response;
    }
}
