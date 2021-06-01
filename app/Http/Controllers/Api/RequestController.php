<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestForm;
use App\Http\Resources\RequestOfferResource;
use App\Http\Resources\RequestResource;
use App\RequestOffer;
use App\UserService;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public $success = 200;
    public $error = 422;
    public $messages = [
        'updated_successfully'=>[
            'ar' => 'تم التعديل بنجاح ',
            'en' => 'updated successfully',
        ],
        'request_cancelled_successfully'=>[
            'ar' => 'تم الغاء الطلب بنجاح ',
            'en' => 'request cancelled successfully',
        ],
        'request_cancelled_failed'=>[
            'ar' => 'الطلب قيد التنفيذ بالفعل',
            'en' => 'request is in-progress',
        ],
        'offer_accepted_successfully'=>[
            'ar' => 'تم قبول العرض بنجاح',
            'en' => 'offer accepted successfully',
        ],
        'added_successfully'=>[
            'ar' => 'تم الاضافة بنجاح ',
            'en' => 'saved successfully',
        ],
        'phone_verification_sent_successfully'=>[
            'ar' => 'تم ارسال كود التفعيل بنجاح  ',
            'en' => 'phone verification code sent successfully',
        ],
        'new_request_notification'=>[
            'ar' => 'يوجد طلب جديد بانتظارك',
            'en' => 'new request',
        ],
        'new_offer_notification'=>[
            'ar' => 'يوجد عرض سعر جديد بانتظارك',
            'en' => 'new price offer',
        ],
        'provider_complete_service'=>[
            'ar' => 'تم تسليم الخدمة بنجاح',
            'en' => 'service delivered successfully',
        ],


    ];

    public function make_request(RequestForm $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $data = $request->all();
        $data['user_id'] = \Auth::id();
        $data['status'] = 'pending';
        if ($request->hasFile('photos')){
            $photos = [];
            for ($x=0;$x<count($request->photos);$x++){
                $file = $request->file('photos')[$x];
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename =time().mt_rand(1000,9999).'.'.$extension;
                $file->move('img/services/', $filename);
                $photos[] = 'img/services/'.$filename;
            }//end for
            $data['photos'] = serialize($photos);
        }//end if
        $req = new \App\Request($data);
        $req->save();
        //send notification
        $services_of_users = UserService::where('service_id',$req->service_id)->pluck('user_id')->toArray();
        $re_providers = \App\User::whereNotNull('device_token')->whereIn('id',$services_of_users)->pluck('device_token')->all();
        $result = sendNotification($re_providers,$this->messages['new_request_notification'][$lang],$this->messages['new_request_notification'][$lang]);
        return response(['status' => $this->success, 'data' => [$this->messages['added_successfully'][$lang]]]);

    }//end make_request

    public function my_requests(Request $request){
        if (\Auth::user()->hasRole('user')){
            $requests = \App\Request::where('user_id',\Auth::id())->orderby('id','desc')->get();
        }elseif (\Auth::user()->hasRole('provider')){
            $requests = \App\Request::where('provider_id',\Auth::id())->orderby('id','desc')->get();

        }
        return response(['status' => $this->success, 'data' => RequestResource::collection($requests)]);

        }//end my_requests
    public function in_progress_requests(Request $request){
        if (\Auth::user()->hasRole('user')){
            $requests = \App\Request::where([
                ['user_id',\Auth::id()],['status','in-progress']
            ])->orderby('id','desc')->get();
        }elseif (\Auth::user()->hasRole('provider')){
            $requests = \App\Request::where([
                ['provider_id',\Auth::id()],['status','in-progress']
            ])->orderby('id','desc')->get();

        }else{
            $requests = [];
        }
        return response(['status' => $this->success, 'data' => RequestResource::collection($requests)]);

        }//end in_progress_requests
    public function completed_requests(Request $request){
        if (\Auth::user()->hasRole('user')){
            $requests = \App\Request::where([
                ['user_id',\Auth::id()],['status','completed']
            ])->orderby('id','desc')->get();
        }elseif (\Auth::user()->hasRole('provider')){
            $requests = \App\Request::where([
                ['provider_id',\Auth::id()],['status','completed']
            ])->orderby('id','desc')->get();

        }else{
            $requests = [];
        }
        return response(['status' => $this->success, 'data' => RequestResource::collection($requests)]);

        }//end completed_requests
    public function available_requests(Request $request){
        if (\Auth::user()->admin_verified == 1){
            $user_services = \Auth::user()->services->pluck('service_id')->toArray();
            $requests = \App\Request::where('status','pending')->whereIn('service_id',$user_services)->orderby('id','desc')->get();
            return response(['status' => $this->success, 'data' => RequestResource::collection($requests)]);
        }else{
            return response(['status' => $this->success, 'data' =>[]]);
        }
        }//end available_requests

    public function get_request_details($id){
        $req = \App\Request::findOrFail($id);
        return response(['status' => $this->success, 'data' => new RequestResource($req)]);
    }//end get_request_details
    public function provider_complete_service($id,Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $req = \App\Request::findOrFail($id);
        $req->status = 'completed';
        $req->save();
        //send notification
        $re_providers = \App\User::whereNotNull('device_token')->where('id',$req->user_id)->pluck('device_token')->all();
        $result = sendNotification($re_providers,$this->messages['provider_complete_service'][$lang],$this->messages['provider_complete_service'][$lang]);
        return response(['status' => $this->success, 'data' => [$this->messages['provider_complete_service'][$lang]]]);
    }//end provider_complete_service
    public function get_offer_details($id){
        $req = \App\RequestOffer::findOrFail($id);
        return response(['status' => $this->success, 'data' => new RequestOfferResource($req)]);
    }//end get_offer_details
    public function user_cancel_request($id,Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $req = \App\Request::findOrFail($id);
        if ($req->status == 'pending'){
            $req->status = 'cancelled';
            $req->save();
            return response(['status' => $this->success, 'data' => [$this->messages['request_cancelled_successfully'][$lang]]]);
        }else{
            return response(['status' => $this->error, 'errors' => [$this->messages['request_cancelled_failed'][$lang]]],$this->error);
        }
    }//end user_cancel_request
    public function add_offer($id,Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $req = \App\Request::findOrFail($id);
        if ($req->status == 'pending'){
            $data = $request->all();
            $data['request_id'] = $id;
            $data['user_id'] = \Auth::id();
            $offer = new RequestOffer($data);
            $offer->save();
            //send notification
            $re_providers = \App\User::where('id',$req->user_id)->pluck('device_token')->all();
            $result = sendNotification($re_providers,$this->messages['new_offer_notification'][$lang],$this->messages['new_offer_notification'][$lang]);

            return response(['status' => $this->success, 'data' => [$this->messages['added_successfully'][$lang]]]);
        }else{
            return response(['status' => $this->error, 'errors' => [$this->messages['request_cancelled_failed'][$lang]]],$this->error);
        }

    }//end add_offer

    public function request_offers($id){
        $req = \App\Request::findOrFail($id);
        return response(['status' => $this->success, 'data' => RequestOfferResource::collection($req->offers)]);
    }//end request_offers

    public function user_accept_offer($id,Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $offer = RequestOffer::findOrFail($id);//get offer
        $req = $offer->req;//get offer request
        if ($req->status == 'pending'){
            $req->status = 'in-progress'; //change status to be in progress
            $req->provider_id = $offer->user_id; //change provider id to offer owner
            $req->save();
            //delete other offers
            $other_offers = RequestOffer::where([
                ['request_id',$req->id],['id','!=',$offer->id],
            ])->delete();

            //send notification
            $re_providers = \App\User::where('id',$req->provider_id)->pluck('device_token')->all();
            $result = sendNotification($re_providers,$this->messages['offer_accepted_successfully'][$lang],$this->messages['offer_accepted_successfully'][$lang]);


//        $other_offers->delete();
            return response(['status' => $this->success, 'data' => [$this->messages['offer_accepted_successfully'][$lang]]]);
        }else{
            return response(['status' => $this->error, 'errors' => [$this->messages['request_cancelled_failed'][$lang]]],$this->error);

        }


    }//end user_accept_offer

    public function my_offers(){
        $user = \Auth::user();
        $offers = RequestOffer::where('user_id',$user->id)->orderBy('id','desc')->get();
//        $requests = \App\Request::whereIn('id',$offers)->orderBy('id','desc')->get();
        return response(['status' => $this->success, 'data' => RequestOfferResource::collection($offers)]);
    }//end my_offers


}
