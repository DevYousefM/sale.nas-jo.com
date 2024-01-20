<?php

namespace App\Models;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $guarded = [];

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    //relations
    public function country(){
        return $this->belongsTo(Country::class);
    }//end of country function

    public function city(){
        return $this->belongsTo(City::class);
    }//end of city function

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function favorites(){
        return $this->belongsToMany(Post::class,'favorite_client','client_id','post_id');
    }

    public function orders(){
        return $this->belongsToMany(Post::class,'client_post','client_id','post_id');
    }

}//end of class
