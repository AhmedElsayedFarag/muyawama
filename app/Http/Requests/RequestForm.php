<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RequestForm extends FormRequest
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
            'service_id' => 'required',
            'service_option_id' => 'required',
            'number_of_professionals' => 'required',
            'days_or_hours' => 'required',
            'number_of_days_or_hours' => 'required',
            'gender' => 'required',
            'service_time' => 'required',
            'language' => 'required',
            'description' => 'required',

        ];
    }

    public function messages()
    {
        $messages = [
            'ar'=>[
                'number_of_professionals.required' => 'عدد المجترفين  مطلوب',
                'number_of_days_or_hours.required' => 'عدد الايام او الساعات  مطلوب',
                'gender.required' => 'النوع  مطلوب',
                'service_time.required' => 'وقت الطلب  مطلوب',
                'description.required' => 'وصف الطلب  مطلوب',

            ],
            'en'=>[
                'name.required' => 'The username is required',
            ],
        ];
        return $messages[($this->hasHeader('lang'))?$this->header('lang'):'en'];
    }

    protected function failedValidation(Validator $validator) {
        $errors = [];
        foreach ($validator->errors()->all() as $error){
            $errors[] = $error;
        }//end foreach
        $response = [
            'status' => 422,
            'errors' => $errors
        ];
        throw new HttpResponseException(response()->json($response, 422));
    }}
