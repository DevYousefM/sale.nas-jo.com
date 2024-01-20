<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class Admin extends  Authenticatable
{
    use LaratrustUserTrait;
    protected $guarded = [];
}//end of class
