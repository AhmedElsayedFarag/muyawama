<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Http\Resources\UserResource;
use App\PhoneVerification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public $success = 200;
    public $error = 422;
    public $messages = [
        'updated_successfully'=>[
            'ar' => 'تم التعديل بنجاح ',
            'en' => 'updated successfully',
        ],
        'phone_verification_sent_successfully'=>[
            'ar' => 'تم ارسال كود التفعيل بنجاح  ',
            'en' => 'phone verification code sent successfully',
        ],
        'password_wrong'=>[
            'ar' => 'كلمة المرور خطأ',
            'en' => 'password is wrong',
        ],
        'phone_wrong'=>[
            'ar' => '  رقم الهاتف غير صحيح',
            'en' => 'phone number is wrong',
        ],
        'phone_verification_code_wrong'=>[
            'ar' => 'كود خاطىء',
            'en' => 'verification code is wrong',
        ]

    ];


    public function login(LoginFormRequest $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            $accessToken = $user->createToken('authToken')->accessToken;

            return response(['status' => $this->success, 'data' => [
                'token' => $accessToken,
                'user' => new UserResource($user)
            ]]);
        }

        throw ValidationException::withMessages(['password' => 'This value is incorrect']);
    }//end login

    public function register(RegisterFormRequest $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->invitation_code =createRandomCode();
        $user->save();
        //assign role
        $user->assignRole($request->type);
        //check if has invitation code
        if ($request->has('invitation_code')){
            $inviter = User::where('invitation_code',$request->invitation_code)->first();
            if ($inviter){
                $inviter->coins += 100;
                $inviter->save();
            }
        }//end if
        //send phone verification code
        $phone_verification = new PhoneVerification();
        $phone_verification->user_id = $user->id;
        $phone_verification->code = 1111;
//        $phone_verification->code = mt_rand(1000,9999);
        $phone_verification->save();
        //send notification to admin
        $admins = User::Role('admin')->pluck('id')->toArray();
        sendInnerNotification($admins,'new_register',"$user->name has signed up");
        return response(['status' => $this->success, 'data' => [$this->messages['phone_verification_sent_successfully'][($request->hasHeader('lang'))?$request->header('lang'):'en']]]);
    }//end register

    public function verify_phone(Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $user = User::where('phone',$request->phone)->first();
        if ($user){
            $phone_code = PhoneVerification::where([
                ['user_id',$user->id],['code',$request->code]
            ])->first();
            if ($phone_code){
                $user->phone_verified = 1;
                $user->save();
                $accessToken = $user->createToken('authToken')->accessToken;
                $phone_code->delete();
                return response(['status' => $this->success, 'data' => ['token' => $accessToken,'user' => new UserResource($user) ]]);
            }else{
                return response(['status' => $this->error, 'errors' => [$this->messages['phone_verification_code_wrong'][$lang]]],$this->error);
            }
        }else{
            return response(['status' => $this->error, 'errors' => [$this->messages['phone_wrong'][$lang]]],$this->error);
        }

    }//end verify_phone

    public function change_password(Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $user = \Auth::user();
        if (Hash::check($request->old_password,$user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response(['status' => $this->success, 'data' => [$this->messages['updated_successfully'][$lang]]]);
        }else{
            return response(['status' => $this->error, 'errors' => [$this->messages['password_wrong'][$lang]]],$this->error);

        }
    }//end change_password

    public function forget_password(Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $user = User::where('phone',$request->phone)->first();
        if ($user){
            //send phone verification code
            $phone_verification = new PhoneVerification();
            $phone_verification->user_id = $user->id;
            $phone_verification->code = 1111;
//            $phone_verification->code = mt_rand(1000,9999);
            $phone_verification->save();
            return response(['status' => $this->success, 'data' => [$this->messages['phone_verification_sent_successfully'][$lang]]]);

        }else{
            return response(['status' => $this->error, 'errors' => [$this->messages['phone_wrong'][$lang]]],$this->error);

        }
    }//end forget_password
    public function resend_code(Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $user = User::where('phone',$request->phone)->first();
        return response(['status' => $this->success, 'data' => [$this->messages['phone_verification_sent_successfully'][$lang]]]);
    }//end resend_code
    public function check_phone_code(Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $user = User::where('phone',$request->phone)->first();
        if ($user){
            $phone_code = PhoneVerification::where([
                ['user_id',$user->id],['code',$request->code]
            ])->first();
            if ($phone_code){
                $user->phone_verified = 1;
                $user->save();
                $accessToken = $user->createToken('authToken')->accessToken;
                $phone_code->delete();
                return response(['status' => $this->success, 'data' => ['token' => $accessToken,'user' => new UserResource($user) ]]);
            }else{
                return response(['status' => $this->error, 'errors' => [$this->messages['phone_verification_code_wrong'][$lang]]],$this->error);
            }
        }else{
            return response(['status' => $this->error, 'errors' => [$this->messages['phone_wrong'][$lang]]],$this->error);
        }
    }//end check_phone_code

    public function new_password(Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $user = \Auth::user();
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response(['status' => $this->success, 'data' => [$this->messages['updated_successfully'][$lang]]]);
    }//end new_password

    public function update_device_token(Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $user = \Auth::user();
        $user->device_token = $request->device_token;
        $user->save();
        return response(['status' => $this->success, 'data' => [$this->messages['updated_successfully'][$lang]]]);
    }//end update_device_token


}
