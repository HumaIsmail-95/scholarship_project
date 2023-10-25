<?php

namespace App\Http\Requests\website;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

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
        $user_id = auth()->user()->id;
        $trav = Student::with(['studentGalleries' => function ($travel) {
            $travel->where('type', 'travel_proof');
        }])->where('user_id', $user_id)->get();

        $id_card = Student::with(['studentGalleries' => function ($card) {
            $card->where('type', 'id_card');
        }])->where('user_id', $user_id)->get();
        // $user_id = $request->route('user');
        // if (empty($user_id) && $request->isMethod('put')) :
        // endif;
        if ($request->travel_history == 0) {
            $rules['traveled_to'] = ['nullable'];
            $rules['travel_document'] = ['nullable'];
        } else {

            if ($trav->isNotEmpty()) {
                $rules['travel_document'] = ['nullable', 'max:2048', 'mimes:pdf'];
            } else {
                $rules['travel_document'] = ['required', 'max:2048', 'mimes:pdf'];
            }
            $rules['traveled_to'] = ['required'];
        }
        if ($id_card->isNotEmpty()) {
            $rules['id_document'] = ['nullable', 'max:2048', 'mimes:pdf'];
        } else {
            $rules['id_document'] = ['required', 'max:2048', 'mimes:pdf'];
        }
        $rules['title'] = ['required'];
        $rules['name'] = ['required'];
        $rules['sur_name'] = ['required'];
        $rules['email'] = ['required', 'email', Rule::unique('students', 'user_id')->ignore($user_id, 'user_id')];
        $rules['mobile'] = ['required', Rule::unique('students', 'user_id')->ignore($user_id, 'user_id')];
        $rules['alternative_modile'] = ['required'];
        $rules['gender'] = ['required'];
        $rules['d_o_b'] = ['required'];
        $rules['id_type'] = ['required'];
        $rules['id_number'] = ['required'];
        $rules['nationality'] = ['required'];
        $rules['visa_holder'] = ['required'];
        $rules['address'] = ['nullable'];
        $rules['city'] = ['nullable'];
        $rules['post_code'] = ['nullable'];
        $rules['state'] = ['nullable'];
        $rules['country'] = ['required'];
        return $rules;
    }
}
