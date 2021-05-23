<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ServiceOption extends Model
{
    use Translatable;
    public $translatedAttributes = ['title'];

}
