<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CourseRequest extends FormRequest
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
            'name' => ['required'],
            'uni_id' => ['required', 'integer'],
            'country_id' => ['required'],
            'city_id' => ['required', 'integer'],
            'duration' => ['required'],
            'degree_id' => ['required', 'integer'],
            'tuition_fee' => ['required'],
            'tuition_fee_type' => ['required'],
            'study_model_id' => ['required', 'integer'],
            'discipline_id' => ['required', 'integer'],
            'season' => ['nullable'],
            'description' => ['nullable'],
            'requirement_details' => ['nullable'],
            'other_requirements' => ['nullable'],
            'start_month' => ['nullable'],
            'test_name.*' => ['required'],
            'min_score.*' => ['required'],
            'min_score_level.*' => ['required'],
        ];
    }
}
