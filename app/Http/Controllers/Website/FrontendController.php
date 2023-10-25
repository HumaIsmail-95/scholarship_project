<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\City;
use App\Models\Discipline;
use App\Models\Setting;
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
        $disciplines = Discipline::withCount('courses')->take(8)->where('status', 1)->get();
        $cities = City::where('countryID', 'LIKE', 'CHN')->get();
        $packages = SubscriptionPackage::where('status', 1)->get();
        $popular = FrontEndService::getPopular();
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banners = Banner::where('page_name', 'home')->select('image_url')->take(8)->get();
        $featuredUnis = University::where('featured', 1)->with(['images' => function ($query) {
            $query->where('type', 'logo')->select('id', 'image_url', 'uni_id');
        }])->withCount('courses')->get();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        $allDisciplines = Discipline::withCount('courses')->where('status', 1)->get();
        $footerData = Setting::select('introduction', 'copy_right', 'facebook_link', 'twitter_link', 'linkedin_link', 'address', 'mobile_1', 'mobile_2')->first();
        return view('website.pages.home', compact('allDisciplines', 'disciplines', 'cities', 'packages', 'popular', 'logo', 'banners', 'featuredUnis', 'footer', 'footerData'));
    }
    public function allCourses()
    {
        $disciplines = Discipline::withCount('courses')->where('status', 1)->get();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'all_courses')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        $footerData = Setting::select('introduction', 'copy_right', 'facebook_link', 'twitter_link', 'linkedin_link', 'address', 'mobile_1', 'mobile_2')->first();
        return view('website.pages.all_courses', compact('disciplines', 'cities', 'banner', 'logo', 'footer', 'footerData'));
    }
    public function subscriptions()
    {
        $disciplines = Discipline::where('status', 1)->get();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $packages = SubscriptionPackage::where('status', 1)->get();
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'subscription')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        $footerData = Setting::select('introduction', 'copy_right', 'facebook_link', 'twitter_link', 'linkedin_link', 'address', 'mobile_1', 'mobile_2')->first();
        return view('website.pages.subscriptions', compact('disciplines', 'cities', 'packages', 'logo', 'banner', 'footer', 'footerData'));
    }
    public function programs(Request $request)
    {
        $disciplines = Discipline::where('status', 1)->get();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $programs = FrontEndService::getPrograms($request);
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'programs')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        $footerData = Setting::select('introduction', 'copy_right', 'facebook_link', 'twitter_link', 'linkedin_link', 'address', 'mobile_1', 'mobile_2')->first();
        return view('website.pages.programs', compact('programs', 'disciplines', 'cities', 'logo', 'banner', 'footer', 'footerData'));
    }
    public function programDetails($id)
    {
        $disciplines = Discipline::where('status', 1)->get();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $programDetail = FrontEndService::getProgramDetail($id);
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'programs')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        $footerData = Setting::select('introduction', 'copy_right', 'facebook_link', 'twitter_link', 'linkedin_link', 'address', 'mobile_1', 'mobile_2')->first();
        return view('website.pages.programDetail', compact('programDetail', 'disciplines', 'cities', 'logo', 'banner', 'footer', 'footerData'));
    }
    public function universityDetail($id)
    {
        $disciplines = Discipline::where('status', 1)->get();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $universityDetail = FrontEndService::universityDetail($id);
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'subscription')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        $footerData = Setting::select('introduction', 'copy_right', 'facebook_link', 'twitter_link', 'linkedin_link', 'address', 'mobile_1', 'mobile_2')->first();
        return view('website.pages.universityDetail', compact('universityDetail', 'disciplines', 'cities', 'logo', 'banner', 'footer', 'footerData'));
    }
    public function about()
    {
        $about = Setting::select('about_us')->first();
        $disciplines = Discipline::where('status', 1)->get();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'about')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        $footerData = Setting::select('introduction', 'copy_right', 'facebook_link', 'twitter_link', 'linkedin_link', 'address', 'mobile_1', 'mobile_2')->first();
        return view('website.pages.about_us', compact('logo', 'banner', 'disciplines', 'cities', 'footer', 'about', 'footerData'));
    }
    public function privacy()
    {
        $privacy = Setting::select('privacy_policy')->first();
        $disciplines = Discipline::where('status', 1)->get();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'privacy')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        $footerData = Setting::select('introduction', 'copy_right', 'facebook_link', 'twitter_link', 'linkedin_link', 'address', 'mobile_1', 'mobile_2')->first();
        return view('website.pages.privacy', compact('logo', 'banner', 'disciplines', 'cities', 'footer', 'privacy', 'footerData'));
    }
    public function blogs()
    {
        $disciplines = Discipline::where('status', 1)->get();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'blogs')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        $footerData = Setting::select('introduction', 'copy_right', 'facebook_link', 'twitter_link', 'linkedin_link', 'address', 'mobile_1', 'mobile_2')->first();

        $recentBlogs = Blog::take(4)->get();
        $blogs = Blog::paginate(10);

        return view('website.pages.blog', compact('logo', 'banner', 'disciplines', 'cities', 'footer', 'footerData', 'recentBlogs', 'blogs'));
    }
    public function blogDetail(Blog $blog)
    {
        $disciplines = Discipline::where('status', 1)->get();
        $cities = City::where('countryID', 'LIKE', 'CHN');
        $logo = Banner::where('page_name', 'logo')->select('image_url')->first();
        $banner = Banner::where('page_name', 'blogs')->select('image_url')->first();
        $footer = Banner::where('page_name', 'footer')->select('image_url')->first();
        $footerData = Setting::select('introduction', 'copy_right', 'facebook_link', 'twitter_link', 'linkedin_link', 'address', 'mobile_1', 'mobile_2')->first();

        $recentBlogs = Blog::take(4)->get();

        return view('website.pages.blog_detail', compact('logo', 'banner', 'disciplines', 'cities', 'footer', 'footerData', 'recentBlogs', 'blog'));
    }
}
