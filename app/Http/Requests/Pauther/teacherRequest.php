<?php

namespace App\Http\Requests\Pauther;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class teacherRequest extends FormRequest
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
            'type_id'=>'required|string',
            'opus_id'=>'required|string',
            'teacher_name'=>'required|string',
            'teacher_card'=>'required|string',
            'teacher_nation'=>'required|string',
            'teacher_age'=>'required|string',
            'teacher_area'=>'required|string',
            'school_name'=>'required|string',
            'school_depa'=>'required|string',
            'contact_number'=>'required|string',
            'teacher_post'=>'required|string',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(json_fail('参数错误!',$validator->errors()->all(),422)));
    }
}
