<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        // dd($request->all());
        $route_id = $request->route('user');


        if (empty($route_id) && $request->isMethod('put')) :
            $route_id = auth()->user()->id;
        endif;


        $rules =  [
            'name' => ['required', 'max:255'],
            'email' => ['required', Rule::unique('users')->ignore($route_id)],
            'type' => ['required'],
            'password' => ['required', 'confirmed'],

        ];


        if ((empty($request->route('user') || !$request->isMethod('put')))) :
            $rules['password'] = ['required', 'confirmed'];
        endif;


        return $rules;
    }
}
