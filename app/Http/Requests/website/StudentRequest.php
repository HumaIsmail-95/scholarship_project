<?php

namespace App\Http\Requests\website;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule as ValidationRule;

class StudentRequest extends FormRequest
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
        $route_id = $request->route('user');
        if (empty($route_id) && $request->isMethod('put')) :
            $route_id = auth()->user()->id;
        endif;
        if ($request->travel_history == 0) {
            $rules['traveled_to'] = ['nullable'];
            $rules['travel_document'] = ['nullable'];
        } else {
            $rules['traveled_to'] = ['required'];
            $rules['travel_document'] = ['required', 'max:2048', 'mimes:pdf'];
        }
        if ($request->method == 'edit') {
            # code...
            $rules['id_document'] = ['nullable', 'max:2048', 'mimes:pdf'];
        } else {
            $rules['id_document'] = ['required', 'max:2048', 'mimes:pdf'];
        }

        $rules =  [
            'title' => ['required'],
            'name' => ['required'],
            'sur_name' => ['required'],
            'email' => ['required', 'email', ValidationRule::unique('users')->ignore($route_id)],
            'mobile' => ['required', ValidationRule::unique('students', 'user_id')->ignore($route_id)],
            'alternative_modile' => ['required'],
            'gender' => ['required'],
            'd_o_b' => ['required'],
            'id_type' => ['required'],
            'id_number' => ['required'],
            'nationality' => ['required'],
            'visa_holder' => ['required'],
            'address' => ['nullable'],
            'city' => ['nullable'],
            'post_code' => ['nullable'],
            'state' => ['nullable'],
            'country' => ['required'],
        ];
        return $rules;
    }
}
