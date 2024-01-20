<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App;

class TermController extends Controller
{
    use GeneralTrait;

    public function index(Request $request){
        $lang = $request->header('Accept-Language');
        if($lang){
            App::setLocale($lang);
        }
        $term = Term::first();
        return $this->returnData('data' , $term);
    }//end of index function

}//end of class
