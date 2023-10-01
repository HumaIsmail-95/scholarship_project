<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\website\StudentRequest;
use App\Models\User;
use App\Services\admin\StudentService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:list-subscription', ['only' => ['index']]);
    //     $this->middleware('permission:create-subscription', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:edit-subscription', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:delete-subscription', ['only' => ['destroy']]);
    // }
    public function index()
    {
        return view('website.pages.dashboard.index');
    }
    public function myUniApp()
    {
        return view('website.pages.dashboard.my_uni_app');
    }
    public function personalInfo(StudentRequest $request, User $user)
    {
        try {
            $response = StudentService::store($request, $user);
            return $response;
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
}
