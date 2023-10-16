<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SettingRequest;
use App\Models\Setting;
use App\Services\admin\SettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view-privacy-policy', ['only' => ['privacyPolicy']]);
        $this->middleware('permission:edit-privacy-policy', ['only' => ['edit', 'updatePrivacy']]);

        $this->middleware('permission:view-about-us', ['only' => ['edit', 'aboutUs']]);
        $this->middleware('permission:edit-about-us', ['only' => ['edit', 'updateAbout']]);

        $this->middleware('permission:view-contact-us', ['only' => ['edit', 'updateContact']]);
        $this->middleware('permission:edit-contact-us', ['only' => ['edit', 'updateContact']]);
    }
    public function privacyPolicy()
    {
        try {
            $data = Setting::select('id', 'privacy_policy')->first();
            return view('admin.pages.settings.privacy.edit', compact('data'));
            //code...
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
    public function updatePrivacy(Setting $setting, SettingRequest $request)
    {
        try {
            $res = Setting::updatePolicy($setting, $request);
            return $res;
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status' => false, 'icon' => 'error', 'heading' => 'Error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function contactUs()
    {
        try {
            $data = Setting::select('id', 'contact_us', 'mobile_1', 'mobile_2', 'address', 'copy_right', 'introduction', 'facebook_link', 'twitter_link', 'linkedin_link')->first();
            // dd($data//);
            return view('admin.pages.settings.contact.edit', compact('data'));
            //code...
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
    public function updateContact(Setting $setting, SettingRequest $request)
    {
        try {
            $res = SettingService::updateContact($setting, $request);
            return $res;
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status' => false, 'icon' => 'error', 'heading' => 'Error',
                'message' => $th->getMessage()
            ]);
        }
    }
    public function aboutUs()
    {
        try {
            $data = Setting::select('id', 'about_us')->first();
            // dd($data//);
            return view('admin.pages.settings.about.edit', compact('data'));
            //code...
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
    }
    public function updateAbout(Setting $setting, SettingRequest $request)
    {
        try {
            $res = SettingService::updateAbout($setting, $request);
            return $res;
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status' => false, 'icon' => 'error', 'heading' => 'Error',
                'message' => $th->getMessage()
            ]);
        }
    }
}
