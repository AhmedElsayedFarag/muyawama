<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'min:5|unique:users,name,'.\Auth::id(),
            'phone' => 'unique:users,phone,'.\Auth::id(),
            'password' => 'min:6',
        ];
    }

    public function messages()
    {
        $messages = [
            'ar'=>[
                'name.required' => 'اسم المستخدم مطلوب',
                'phone.required' => 'رقم الجوال  مطلوب',
                'name.unique' => 'اسم المستخدم محجوز مسبقا',
                'name.min' => 'اسم المستخدم لا يقل عن :min حروف',
                'password.min' => 'كلمة المرور  لا تقل عن :min حروف',
                'password.required' => 'كلمة المرور مطلوبة',
            ],
            'en'=>[
                'name.required' => 'The username is required',
                'password.required' => 'The password is required',
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
