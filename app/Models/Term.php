<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Term extends Model
{
    use Translatable;
    public $translatedAttributes = ['value'];
    protected $fillable = ['*'];

}//end of class
