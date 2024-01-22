<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Modal extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['brand', 'modals'];
    public $translatedAttributes = ['brand'];
    protected $casts = ['modals' => 'json'];

    // public function subcategories()
    // {
    //     return $this->belongsToMany(SubCategory::class, 'category_sub_category');
    // }
}
