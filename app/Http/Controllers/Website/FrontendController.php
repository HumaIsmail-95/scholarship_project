<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\City;
use App\Models\Discipline;
use App\Models\Student;
use App\Models\SubscriptionPackage;
use App\Models\UniCourse;
use App\Models\University;
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
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banners = Banner::where('page_name', 'home')->select('image_url')->take(8)->get();
        $featuredUnis = University::where('featured', 1)->with(['images' => function ($query) {
            $query->where('type', 'logo')->select('id', 'image_url', 'uni_id');
        }])->withCount('courses')->get();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        return view('website.pages.home', compact('disciplines', 'cities', 'packages', 'popular', 'logo', 'banners', 'featuredUnis', 'footer'));
    }
    public function allCourses()
    {
        $disciplines = Discipline::withCount('courses')->get();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'all_courses')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        return view('website.pages.all_courses', compact('disciplines', 'cities', 'banner', 'logo', 'footer'));
    }
    public function subscriptions()
    {
        $disciplines = Discipline::all();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $packages = SubscriptionPackage::where('status', 1)->get();
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'subscription')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        return view('website.pages.subscriptions', compact('disciplines', 'cities', 'packages', 'logo', 'banner', 'footer'));
    }
    public function programs(Request $request)
    {
        $disciplines = Discipline::all();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $programs = FrontEndService::getPrograms($request);
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'programs')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        return view('website.pages.programs', compact('programs', 'disciplines', 'cities', 'logo', 'banner', 'footer'));
    }
    public function programDetails($id)
    {
        $disciplines = Discipline::all();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $programDetail = FrontEndService::getProgramDetail($id);
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'programs')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        return view('website.pages.programDetail', compact('programDetail', 'disciplines', 'cities', 'logo', 'banner', 'footer'));
    }
    public function universityDetail($id)
    {
        $disciplines = Discipline::all();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $universityDetail = FrontEndService::universityDetail($id);
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'subscription')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        return view('website.pages.universityDetail', compact('universityDetail', 'disciplines', 'cities', 'logo', 'banner', 'footer'));
    }
    public function about()
    {
        $disciplines = Discipline::all();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'about')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        return view('website.pages.about_us', compact('logo', 'banner', 'disciplines', 'cities', 'footer'));
    }
    public function blogs()
    {
        $disciplines = Discipline::all();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'blogs')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        return view('website.pages.blog', compact('logo', 'banner', 'disciplines', 'cities', 'footer'));
    }
}
