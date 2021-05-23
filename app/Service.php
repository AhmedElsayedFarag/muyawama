<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Translatable;
    public $translatedAttributes = ['name'];

    public function sub_services()
    {
        return $this->hasMany(Service::class,'parent_id');
    }
}
