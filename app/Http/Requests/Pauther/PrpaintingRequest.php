<?php

namespace App\Http\Requests\Pauther;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PrpaintingRequest extends FormRequest
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
                    'prpainting_type' => 'required|string',
                    'opus_name'=>'required|string|unique:prpainting',
                    'contact_name'=>'required|string',
                    'contact_number'=>'required|string',
                    'contact_address' => 'required|string',
                    'create_time' =>'required|string',
                    'opus_long' =>'required|string',
                    'opus_wide' =>'required|string',
                    'opus_file'=>'required|string',
                    'author_brief'=>'required|string',
                    'opus_brief'=>'required|string',
                    'pauthor_name'=>'required|string',
                    'pauthor_card'=>'required|string',
                    'pauthor_area'=>'required|string',
                    'school_name'=>'required|string',
                    'pauther_job'=>'required|string',

        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(json_fail('参数错误!',$validator->errors()->all(),422)));
    }
}
