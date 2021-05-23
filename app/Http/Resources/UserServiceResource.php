<?php

namespace App\Http\Resources;

use App\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class UserServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        return [
            'service'=>Service::find($this->service_id)->translate($lang)->name,
            'service_parent'=>Service::find(Service::find($this->service_id)->parent_id)->translate($lang)->name,
        ];
    }
}
