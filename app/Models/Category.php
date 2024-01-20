<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['name','desc'];
    protected $fillable = ['icon'];

    //realtions
    // public function subcategories(){
    //     return $this->hasMany(SubCategory::class);
    // }//end of subcategories function

    public function subcategories()
    {
        return $this->belongsToMany(SubCategory::class, 'category_sub_category');
    }//end of categories function

}//end of class
