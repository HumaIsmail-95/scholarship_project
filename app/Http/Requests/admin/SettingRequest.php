<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {

        return [
            'about_us' => ['nullable'],
            'contact_us' => ['nullable'],
            'privacy_policy' => ['nullable'],
            'copy_right' => ['nullable'],
            'mobile_1' => ['nullable'],
            'mobile_2' => ['nullable'],
            'address' => ['nullable'],
            'introduction' => ['nullable'],
            'facebook_link' => ['nullable'],
            'twitter_link' => ['nullable'],
            'linkedin_link' => ['nullable'],

        ];
    }
}
