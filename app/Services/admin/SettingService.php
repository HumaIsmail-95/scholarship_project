<?php

namespace App\Services\admin;

use App\Http\Requests\admin\SettingRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SettingService
{
    public static function updatePolicy(Setting $setting, SettingRequest $request)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $privacyData = ['privacy_policy' => $data['privacy_policy']];
        $response = $setting->update($privacyData);
        DB::commit();

        return redirect()->back()->with([
            'status' => true, 'icon' => 'success', 'heading' => 'Success',
            'message' => 'Privacy Policy updated successfully', 'data' => $response,
        ]);
    }

    public static function updateContact(Setting $setting, SettingRequest $request)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $contactData = [
            'contact_us' => $data['contact_us'],
            'mobile_1' => $data['mobile_1'],
            'mobile_2' => $data['mobile_2'],
            'introduction' => $data['introduction'],
            'facebook_link' => $data['facebook_link'],
            'twitter_link' => $data['twitter_link'],
            'linkedin_link' => $data['linkedin_link'],
            'copy_right' => $data['copy_right'],
        ];
        $response = $setting->update($contactData);
        DB::commit();

        return redirect()->back()->with([
            'status' => true, 'icon' => 'success', 'heading' => 'Success',
            'message' => 'Contact us updated successfully', 'data' => $response,
        ]);
    }

    public static function updateAbout(Setting $setting, SettingRequest $request)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $privacyData = ['about_us' => $data['about_us']];
        $response = $setting->update($privacyData);
        DB::commit();

        return redirect()->back()->with([
            'status' => true, 'icon' => 'success', 'heading' => 'Success',
            'message' => 'Privacy Policy updated successfully', 'data' => $response,
        ]);
    }
}
