<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModalTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['brand', "modals"];
    public function setModalsAttribute($modals)
    {
        $this->attributes['modals'] = json_encode($modals);
    }
}
