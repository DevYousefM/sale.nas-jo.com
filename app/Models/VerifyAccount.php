<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifyAccount extends Model
{
    //password_resets
    protected $guarded = [];
    protected $table  = 'password_resets';
    public $timestamps = false;
}
