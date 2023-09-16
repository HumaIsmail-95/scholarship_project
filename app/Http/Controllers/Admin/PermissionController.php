<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\admin\PermissionService;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $permissions = PermissionService::getPermissions();
        return view('admin.pages.permissions.index', compact('permissions'));
    }
}
