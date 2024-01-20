<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Country extends Model
{
    use Translatable;
    public $translatedAttributes = ['name','currency'];
    protected $fillable = ['code','photo'];

    //realtions
    public function cities(){
        return $this->hasMany(City::class);
    }//end of country function

}//end of class
