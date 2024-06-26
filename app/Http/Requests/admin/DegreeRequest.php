<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class DegreeRequest extends FormRequest
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
        return [
            'name' => ['required'],
            'description' => ['nullable'],
            'discipline_id' => ['required', 'integer'],
            'status' => ['nullable',],
            'image' => 'nullable|max:2048|mimes:jpg,png,jpeg',
        ];
    }
}
