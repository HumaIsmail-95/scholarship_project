<?php

namespace App\Http\Requests\admin;

use App\Rules\MaxImages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BannerRequest extends FormRequest
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
        if ($request->type == 'home') {
            $rules['image'] = ['nullable', 'max:4072', new MaxImages(3)];
            $rules['image.*'] = ['required', 'image', 'mimes:png,jpg,bmp', 'max:4072',];
        } elseif (
            $request->type == 'logo'
            || $request->type == 'privacy'
            || $request->type == 'about'
            || $request->type == 'all_courses'
            || $request->type == 'programs'
            || $request->type == 'blogs'
            || $request->type == 'universities'
            || $request->type == 'footer'
        ) {
            $rules['image'] = ['required', 'mimes:png,jpg,bmp', 'image', 'max:2048'];
        }
        $rules['type'] = ['required'];
        return $rules;
    }
}
