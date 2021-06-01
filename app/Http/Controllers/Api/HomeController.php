<?php

namespace App\Http\Controllers\Api;

use App\ContactUs;
use App\Http\Controllers\Controller;
use App\Service;
use App\ServiceOption;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
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
        'message_sent_successfully'=>[
            'ar' => 'تم ارسال رسالتك  بنجاح  ',
            'en' => 'Message sent successfully',
        ],

    ];
    public function services($parent_id,Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        App::setLocale($lang);
        $services = Service::where('parent_id',$parent_id)->with('sub_services')->get();
        return response(['status' => $this->success, 'data' => $services]);
    }//end services
    public function service_options($parent_id,Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        App::setLocale($lang);
        $services = ServiceOption::where('service_id',$parent_id)->get();
        return response(['status' => $this->success, 'data' => $services]);
    }//end service_options
    public function global_values(Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $chat_messages = [
            'en'=>[
                'I am busy right now',
                'Thank you',
                'you are welcome',
                'Hello',
            ],
            'ar'=>[
                'انا مشغول الان',
                'شكرا لك',
                'على الرحب',
                'اهلا',
            ],
        ];
        return response(['status' => $this->success, 'data' => [
            'commission'=>1,
            'chat_messages'=>$chat_messages[$lang],

        ]]);

    }//end global_values

    public function slider(){
        $slider = Slider::OrderBy('id','desc')->get();
        return response(['status' => $this->success, 'data' => $slider]);

    }//end slider


    public function contact_us(Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $contact = ContactUs::create($request->all());
        return response(['status' => $this->success, 'data' => [$this->messages['message_sent_successfully'][$lang]]]);

    }//end contact_us

}
