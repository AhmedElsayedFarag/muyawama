<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestOffer extends Model
{
    protected $fillable = [
        'request_id',
        'user_id',
        'cost',
        'distance_cost',
        'commission',
        'description',
    ];

    public function req()
    {
        return $this->belongsTo(Request::class,'request_id');
    }

}
