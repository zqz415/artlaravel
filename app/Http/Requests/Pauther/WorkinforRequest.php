<?php

namespace App\Http\Requests\Pauther;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class WorkinforRequest extends FormRequest
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
            'workshop_name' =>  'required|string|unique:workshop',
            'contact_name'=>'required|string',
            'contact_number'=>'required|string',
            'contact_address'=>'required|string',
            'contact_company'=>'required|string',
            'contact_post'=>'required|string',
            'contact_email'=>'required|string',
            'workshop_type'=>'required|string',
            'workshop_number'=>'required|string',
            'workshop_brief'=>'required|string',
            'cha_brief'=>'required|string',
            'plan_brief'=>'required|string',
            'workshop_file'=>'required|string'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(json_fail('参数错误!',$validator->errors()->all(),422)));
    }
}
