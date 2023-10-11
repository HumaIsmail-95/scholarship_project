<?php

namespace App\Http\Requests\admin;

use App\Rules\MaxImages;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UniversityRequest extends FormRequest
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
            'name' => ['required', 'max:100'],
            'country' => ['required'],
            'featured' => ['required'],
            'description' => ['nullable'],
            'logo' => ['nullable', 'image', 'max:2048', 'mimes:jpg,bmp,png'],
            'banner' => ['nullable', 'image', 'max:2048', 'mimes:jpg,bmp,png'],
            'gallery' => ['nullable', 'max:2048', new MaxImages(3)],
            'gallery.*' => ['image', 'mimes:jpeg,png,jpg', 'max:4072'],
        ];
    }
}
