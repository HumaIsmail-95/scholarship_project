<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:admin-dashboard', ['only' => ['index']]);
    }
    public function index()
    {
        return view('admin.pages.dashboard');
    }
}
