<?php

namespace App\Http\Controllers\Api;

use App\Chat;
use App\ChatMessage;
use App\ChatUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
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

    public function openChat(Request $request){
        //find if chat exists
        $chat = Chat::where('request_id',$request->request_id)->first();
        if (!$chat){
            //create new chat
            $ids = [];
            $ids[] = \Auth::id();
            $ids[] = $request->user_id;
            $chat = new Chat();
            $chat->request_id = $request->request_id;
            $chat->save();
            //save users
            foreach ($ids as $id){
                $chat_users = new ChatUser();
                $chat_users->chat_id = $chat->id;
                $chat_users->user_id =$id;
                $chat_users->save();
            }//end foreach
        }
        return response(['status' => $this->success, 'data' =>$chat]);


    }

    public function sendMessage(Request $request){
        $message = new ChatMessage();
        if ($request->hasFile('message')){
            $file = $request->file('message');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(public_path('img/chat/'), $filename);
            $message->message = 'img/chat/'.$filename;
            $message->type = 'file';
        }else{
            $message->message = $request->message;
        }
        $message->chat_id = $request->chat_id;
        $message->user_id = \Auth::id();
        $message->save();

        app('App\Http\Controllers\Admin\FirebaseController')->sendMessage($message->toArray(),$request->chat_id);
        return response(['status' => $this->success, 'data' =>[]]);

    }//end sendMessage

    public function get_all_chat_messages(Request $request){
        $messages = ChatMessage::where('chat_id',$request->chat_id)->orderBy('id','desc')->get();
        return response(['status' => $this->success, 'data' =>$messages]);
    }
}
