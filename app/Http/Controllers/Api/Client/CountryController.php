<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App;

class CountryController extends Controller
{
    use GeneralTrait;

    public function all(Request $request){
        $lang = $request->header('Accept-Language');
        if($lang){
            App::setLocale($lang);
        }
        $countries = Country::all();
        return $this->returnData('data' , $countries);
    }//end of all function

    public function getCitiesByID($id,Request $request){
        $lang = $request->header('Accept-Language');
        if($lang){
            App::setLocale($lang);
        }
        $country = Country::find($id);
        if($country){
            return $this->returnData('data' , $country->cities);
        }else{
            return $this->returnError('001',__('api.item_not_found'));
        }
    }//end of getCitiesByID function

}//end of class
