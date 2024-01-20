<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class AdminNotify extends Model
{
    use Translatable;
    public $translatedAttributes = ['message'];
    protected $fillable = ['client_id','post_id'];

    //realtions
    public function client(){
        return $this->belongsTo(Client::class);
    }//end of client function

      //realtions
      public function post(){
        return $this->belongsTo(Post::class);
    }//end of client function

}
