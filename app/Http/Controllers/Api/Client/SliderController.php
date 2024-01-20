<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Traits\GeneralTrait;

class SliderController extends Controller
{
    use GeneralTrait;

    public function index(){
        $slider = Slider::where('status',1)->get();
        return $this->returnData('data' , $slider);
    }//end of index function

}//end of class
