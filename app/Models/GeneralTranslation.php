<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','desc','location'];
}//end of class
