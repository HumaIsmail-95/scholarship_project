<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Discipline;
use App\Models\UniCourse;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $disciplines = Discipline::take(8)->get();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        return view('website.pages.home', compact('disciplines', 'cities'));
    }
    public function allCourses()
    {
        $disciplines = Discipline::take(8)->get();
        $cities = City::where('countryID', 'LIKE', 'CHN');

        return view('website.pages.all_courses', compact('disciplines', 'cities'));
    }
}
