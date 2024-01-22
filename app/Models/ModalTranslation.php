<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModalTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['brand', "modals"];
    protected $casts = ['modals' => 'json'];
}
