<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Post extends Model
{
    use Translatable;
    public $translatedAttributes = ['title','desc'];
    protected $guarded = [];
    //realtions


    public function features(){
        return $this->belongsToMany(Feature::class , 'feature_post')->withPivot('value');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }//end of subcategories function



    //realtions
    public function subcategory(){
        return $this->belongsTo(SubCategory::class , 'sub_category_id');
    }//end of subcategories function

    public function country(){
        return $this->belongsTo(Country::class);
    }//end of country function


    public function city(){
        return $this->belongsTo(City::class);
    }//end of country function

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function favorite(){
        return $this->belongsToMany(Client::class,'favorite_client','post_id','client_id');
    }

    // public function favorite(){
    //     return $this->hasOne(Client::class,'favorite_client','post_id','client_id');
    // }




}//end of class
