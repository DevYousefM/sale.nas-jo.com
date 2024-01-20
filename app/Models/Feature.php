<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Feature extends Model
{
    use Translatable;
    public $translatedAttributes = ['name'];
    protected $fillable = ['inputType'];

    public function subcategories()
    {
        return $this->belongsToMany(SubCategory::class, 'feature_sub_category');
    }//end of subcategories function

}//end of class
