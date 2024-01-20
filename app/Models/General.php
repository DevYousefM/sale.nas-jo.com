<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class General extends Model
{
    use Translatable;
    public $translatedAttributes = ['title','desc','location'];
    protected $fillable = ['email','mobile','logo','icon'];

}//end of class

