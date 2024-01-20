<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class AboutUs extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['about_app','our_vision','our_mission','our_services'];
    protected $fillable = ['*'];
}//end of class
