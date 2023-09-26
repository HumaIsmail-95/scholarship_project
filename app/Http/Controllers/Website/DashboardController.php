<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('website.pages.dashboard.index');
    }
    public function myUniApp()
    {
        return view('website.pages.dashboard.my_uni_app');
    }
}
