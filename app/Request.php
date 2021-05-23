<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'service_id',
        'service_option_id',
        'user_id',
        'provider_id',
        'number_of_professionals',
        'days_or_hours',
        'number_of_days_or_hours',
        'gender',
        'service_time',
        'language',
        'description',
        'photos',
        'city',
        'area',
        'building_number',
        'floor_number',
        'lat',
        'lng',
        'status',
    ];

    public function offers()
    {
        return $this->hasMany(RequestOffer::class);
    }
    public function chat()
    {
        return $this->hasOne(Chat::class);
    }

}
