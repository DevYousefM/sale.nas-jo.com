<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUsTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['about_app','our_vision','our_mission','our_services'];
}//end of class

