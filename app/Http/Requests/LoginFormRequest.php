<?php

namespace App\Http\Requests;

use App\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginFormRequest extends FormRequest
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
            'phone' => 'required|exists:users,phone',
            'password' => 'required',
        ];
    }


    public function messages()
    {
        $messages = [
            'ar'=>[
                'name.required' => 'اسم المستخدم مطلوب',
                'name.exists' => 'اسم المستخدم غير صحيح',
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
            'errors' => $errors,
        ];
        throw new HttpResponseException(response()->json($response, 422));
    }

}
