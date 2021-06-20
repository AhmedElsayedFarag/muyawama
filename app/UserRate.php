<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRate extends Model
{
    public function reviewer(){
        return $this->belongsTo(User::class,'reviewer_id');
    }
}
