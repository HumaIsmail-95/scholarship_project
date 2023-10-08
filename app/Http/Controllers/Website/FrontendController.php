<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Discipline;
use App\Models\SubscriptionPackage;
use App\Models\UniCourse;
use App\Services\website\FrontEndService;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $disciplines = Discipline::withCount('courses')->take(8)->get();
        $cities = City::where('countryID', 'LIKE', 'CHN')->get();
        $packages = SubscriptionPackage::where('status', 1)->get();
        $popular = FrontEndService::getPopular();

        return view('website.pages.home', compact('disciplines', 'cities', 'packages', 'popular'));
    }
    public function allCourses()
    {
        $disciplines = Discipline::all();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        return view('website.pages.all_courses', compact('disciplines', 'cities'));
    }
    public function subscriptions()
    {
        $disciplines = Discipline::all();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $packages = SubscriptionPackage::where('status', 1)->get();
        return view('website.pages.subscriptions', compact('disciplines', 'cities', 'packages'));
    }
    public function programs(Request $request)
    {
        $disciplines = Discipline::all();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $programs = FrontEndService::getPrograms($request);
        return view('website.pages.programs', compact('programs', 'disciplines', 'cities'));
    }
    public function programDetails($id)
    {
        $disciplines = Discipline::all();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $programDetail = FrontEndService::getProgramDetail($id);
        return view('website.pages.programDetail', compact('programDetail', 'disciplines', 'cities'));
    }
}
