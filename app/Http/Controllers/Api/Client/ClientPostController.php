<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Carbon\Carbon;
use App;
use App\Models\AdminNotify;
use Validator;

class ClientPostController extends Controller
{
    use GeneralTrait;

    public function index(Request $request){
        $lang = $request->header('Accept-Language');
        if($lang){
            App::setLocale($lang);
        }
        $posts = auth()->guard('client-api')->user()->orders()->with(['country','city','category','subcategory','features','client','photos'])->get();
        return $this->returnData('data' , $posts);
    }//end of function index

    public function store(Request $request){
        $lang = $request->header('Accept-Language');
        if($lang){
            App::setLocale($lang);
        }
        $rules = [
            'id' => 'required',
        ];
        $messages =  [
            'id.required' =>  __('api.post_required'),
        ];
        $validator = Validator::make($request->all() , $rules,$messages);
        if($validator->fails()){
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code,$validator);
        }
        $id = $request->id;
        $post = Post::find($id);
        if($post){
            $foundPost =auth()->guard('client-api')->user()->orders->where('id',$id)->first();
            if(!$foundPost){
                auth()->guard('client-api')->user()->orders()->sync([$id=>['visits'=>0,'created_date'=>Carbon::today()->toDateString()]]);
                AdminNotify::create([
                    'client_id' => auth()->guard('client-api')->user()->id,
                    'post_id' => $id,
                    'message:en' => __('admin.ad_customer_paid',[],'en').auth()->guard('client-api')->user()->username,
                    'message:ar' => __('admin.ad_customer_paid',[],'ar').auth()->guard('client-api')->user()->username,
                ]);
                return $this->returnSuccessMessage(__('api.created_successfully'), "S000");
            }else{
                return $this->returnError('000F',__('api.cannot_subscribe_because_yours'));
            }
        }else{
            return $this->returnError('000F',__('api.item_not_found'));
        }
    }//end of store function
}//end of controller
