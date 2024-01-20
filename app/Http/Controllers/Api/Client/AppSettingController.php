<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Models\AppSetting;

class AppSettingController extends Controller
{
    use GeneralTrait;
    public function index(){
        $appsetting = AppSetting::first();
        return $this->returnData('data' , $appsetting);
    }
    
}
