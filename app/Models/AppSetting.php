<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $fillable = ['status','message_ar','message_en','nearest_distance'];
    protected $hidden = [
        'id', 'created_at','updated_at'
    ];
}
//end of class
