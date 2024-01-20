<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App;

class AboutUsController extends Controller
{
    use GeneralTrait;

    public function index(Request $request){
        $lang = $request->header('Accept-Language');
        if($lang){
            App::setLocale($lang);
        }
        $aboutus = AboutUs::first();
        return $this->returnData('data' , $aboutus);
    }//end of index function
}//end of class
