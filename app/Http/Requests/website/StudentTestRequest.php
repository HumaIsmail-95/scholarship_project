<?php

namespace App\Http\Requests\website;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StudentTestRequest extends FormRequest
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
            'user_id' => 'required',
            'native_english' => 'nullable',
            'ielts_score' => 'required|integer',
            'pearson_score' => 'required|integer',
            'toelf_score' => 'required|integer',
            'pearson' => 'nullable|max:2048|mimes:pdf',
            'moi' => 'nullable|max:2048|mimes:pdf',
            'ielts' => 'nullable|max:2048|mimes:pdf',
            'toelf' => 'nullable|max:2048|mimes:pdf',
        ];
    }
}
