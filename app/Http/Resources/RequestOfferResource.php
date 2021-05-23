<?php

namespace App\Http\Resources;

use App\Request;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestOfferResource extends JsonResource
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
            'id'=>$this->id,
            'request_id'=>$this->request_id,
            'request'=>new RequestResource(Request::find($this->request_id)),
            'cost'=>$this->cost,
            'distance_cost'=>$this->distance_cost,
            'description'=>$this->description,
            'user_id'=>$this->user_id,
            'user' => new UserResource(User::find($this->user_id)),
            'commission'=>$this->commission,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
