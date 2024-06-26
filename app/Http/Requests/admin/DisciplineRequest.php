<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class DisciplineRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => ['required'],
            'description' => ['nullable'],
            'image' => 'nullable|max:2048|mimes:jpg,png,jpeg',
            'status' => ['nullable'],

        ];
    }
}
