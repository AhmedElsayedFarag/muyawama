<?php

namespace App\Http\Resources;

use App\Service;
use App\ServiceOption;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestResource extends JsonResource
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
            'service_id' => $this->service_id,
            'service' => new ServiceResource(Service::find($this->service_id)),
            'service_option_id' => $this->service_option_id,
            'service_option' => ServiceOption::find($this->service_option_id),
            'user_id' => $this->user_id,
            'user' => new UserResource(User::find($this->user_id)),
            'provider_id' => $this->provider_id,
            'provider' => (isset($this->provider_id))? new UserResource(User::find($this->provider_id)):null,
            'number_of_professionals' => $this->number_of_professionals,
            'days_or_hours' => $this->days_or_hours,
            'number_of_days_or_hours' => $this->number_of_days_or_hours,
            'gender' => $this->gender,
            'service_time' => $this->service_time,
            'language' => $this->language,
            'description' => $this->description,
            'photos' => (unserialize($this->photos))?unserialize($this->photos):[],
            'city' => $this->city,
            'area' => $this->area,
            'building_number' => $this->building_number,
            'floor_number' => $this->floor_number,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'status' => $this->status,
            'offers' => $this->offers,
            'chat' => $this->chat,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
