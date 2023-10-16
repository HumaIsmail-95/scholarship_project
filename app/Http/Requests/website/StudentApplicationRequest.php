<?php

namespace App\Http\Requests\website;

use Illuminate\Foundation\Http\FormRequest;

class StudentApplicationRequest extends FormRequest
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
            'intake' => 'required',
            'sponsor' => 'required|max:100',
            'occupation' => 'required|max:100',
            'visa' => 'required|boolean',
            'notes' => 'required|max:256',
            'doc' => 'required|file|max:2048|mimes:pdf',
        ];
    }
}
