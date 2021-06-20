<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'name'=>$this->translate($request->header('lang'))->name,
            'areas'=> \App\Http\Resources\AreaResource::collection(\App\Area::where('city_id',$this->id)->get())

        ];
    }
}
