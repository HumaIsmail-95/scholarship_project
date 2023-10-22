<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BlogRequest extends FormRequest
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

        $rules =   [
            'description' => ['required'],
            'heading' => ['required'],
            'sub_heading' => ['required'],
        ];
        // $route_id = $request->route('blog');

        if ($request->isMethod('put')) {
            $rules['image'] = ['nullable', 'mimes:png,jpg,jpeg,bmp', 'max:2048'];
        } else {
            $rules['image'] = ['required', 'mimes:png,jpg,jpeg,bmp', 'max:2048'];
        }
        return $rules;
    }
}
