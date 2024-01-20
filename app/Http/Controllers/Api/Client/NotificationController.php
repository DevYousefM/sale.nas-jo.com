<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\ClientNotify;
use App\Traits\GeneralTrait;

class NotificationController extends Controller
{
    use GeneralTrait;

    public function index(Request $request)
    {
        $lang = $request->header('Accept-Language');
        if($lang){
            App::setLocale($lang);
        }
        $client = auth()->guard('client-api')->user();
        $notifications = ClientNotify::where('client_id',$client->id)->with('post')->orderBy('id','desc')->get();
        return $this->returnData('data' , $notifications);
    }//end of index function

    public function destroy($id)
    {
        $notify = ClientNotify::find($id);
        if($notify){
            $notify->delete();
            return $this->returnSuccessMessage(__('api.deleted_successfully'), "S000");
        }else{
            return $this->returnError('000F',__('api.item_not_found'));
        }
    }//end of index function

}//end of controller
