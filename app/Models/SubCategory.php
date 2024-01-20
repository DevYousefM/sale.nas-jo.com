<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class SubCategory extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['name'];
    protected $fillable = ['category_id'];

       //realtions
    // public function category(){
    //     return $this->belongsTo(Category::class);
    // }//end of subcategories function

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_sub_category');
    }//end of categories function

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_sub_category');
    }//end of features function

}
