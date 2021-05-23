<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use App\UserRate;
use App\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
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
        'rated_successfully'=>[
            'ar' => 'تم  التقييم بنجاح  ',
            'en' => 'Rated successfully',
        ],

    ];


    public function update_profile(UpdateProfileRequest $request){
        $user = \Auth::user();
        $data = $request->all();
        if ($request->has('services')){
            $user->services()->delete();
            foreach ($request->services as $service){
                $user_service = new UserService();
                $user_service->user_id = $user->id;
                $user_service->service_id = $service;
                $user_service->save();
            }//end foreach
        }//end if
        if ($request->hasFile('image')){
            if (File::exists($user->image)) {
                File::delete($user->image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move('img/users/', $filename);
            $data['image'] = 'img/users/'.$filename;
        }//end if
        if ($request->hasFile('national_id')){
            if (File::exists($user->national_id)) {
                File::delete($user->national_id);
            }
            $file = $request->file('national_id');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move('img/users/', $filename);
            $data['national_id'] = 'img/users/'.$filename;
        }//end if
        $user->update($data);

        return response(['status' => $this->success, 'data' => [$this->messages['updated_successfully'][($request->hasHeader('lang'))?$request->header('lang'):'en']]]);

    }//end update_profile


    public function rate_user(Request $request){
        $user = \Auth::user();
        $rate = new UserRate();
        $rate->user_id = $request->user_id;
        $rate->reviewer_id = $user->id;
        $rate->rate = $request->rate;
        $rate->review = $request->review;
        $rate->description = serialize($request->description);
        $rate->save();
        return response(['status' => $this->success, 'data' => [$this->messages['rated_successfully'][($request->hasHeader('lang'))?$request->header('lang'):'en']]]);

    }//end rate_user

    public function getUserDetails(Request $request){
        $user = \Auth::user();
        return response(['status' => $this->success, 'data' => [new UserResource($user) ]]);


    }

}
