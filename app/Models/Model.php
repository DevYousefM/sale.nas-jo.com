<?php

namespace App\Modal;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Modal extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['brand', 'model'];
    protected $fillable = ['id'];

    // public function subcategories()
    // {
    //     return $this->belongsToMany(SubCategory::class, 'category_sub_category');
    // }

}
