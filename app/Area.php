<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use Translatable;
    public $translatedAttributes = ['name'];
}
