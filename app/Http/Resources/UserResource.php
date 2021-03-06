<?php

namespace App\Http\Resources;

use App\Service;
use App\UserService;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'phone_verified' => $this->phone_verified,
            'admin_verified' => $this->admin_verified,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'language' => $this->language,
            'invitation_code' => $this->invitation_code,
            'image' => $this->image,
            'experience_years' => $this->experience_years,
            'national_id' => $this->national_id,
            'coins' => $this->coins,
            'services' => getUserProfileServices($this->services,$request->header('lang')),
            'rates' => ($this->rates()->avg('rate'))?ceil($this->rates()->avg('rate')):'0',
            'rate_word' => ($this->rates()->avg('rate'))? getUserRateWord(ceil($this->rates()->avg('rate'))):getUserRateWord(0),
            'device_token' => $this->device_token,
            'unread_notifications_count' => \App\Notification::where([
                ['user_id',$this->id],['read',0]
            ])->count(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
