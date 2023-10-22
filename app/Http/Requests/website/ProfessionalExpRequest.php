<?php

namespace App\Http\Requests\website;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProfessionalExpRequest extends FormRequest
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

        if ($request->isMethod('put')) {
            $rules['certificate.*'] = ['file', 'nullable', 'max:2048', 'mimes:pdf'];
            $rules['transcript.*'] = ['file', 'nullable', 'max:2048', 'mimes:pdf'];
        } else {
            $rules['certificate.*'] = ['file', 'required', 'max:2048', 'mimes:pdf'];
            $rules['transcript.*'] = ['file', 'required', 'max:2048', 'mimes:pdf'];
        }

        if ($request->experience_check == 'on') {
            $rules['joining.*'] = ['nullable'];
            $rules['ending.*'] = ['nullable'];
            $rules['employer_name.*'] = ['nullable'];
            $rules['location.*'] = ['nullable'];
            $rules['title.*'] = ['nullable'];
            $rules['duties.*'] = ['nullable'];
        } else {
            $rules['joining.*'] = ['required'];
            $rules['ending.*'] = ['required'];
            $rules['employer_name.*'] = ['required'];
            $rules['location.*'] = ['required'];
            $rules['title.*'] = ['required'];
            $rules['duties.*'] = ['required'];
        }
        $rules['start.*'] = ['required'];
        $rules['end.*'] = ['required'];
        $rules['program_name.*'] = ['required'];
        $rules['institute_name.*'] = ['required'];
        $rules['grade.*'] = ['required'];

        return $rules;
    }
}
