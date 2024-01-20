<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppSetting;
use App\Http\Requests\Admin\AppSettingRequest;

class AppSettingController extends Controller
{
    //
    public function index(){
        $appsetting = AppSetting::first();
        return view('admin.appsetting.create',compact('appsetting'));
    }

    public function post(AppSettingRequest $request){
        // return $request;
        $appsetting = AppSetting::first();
        if($appsetting){
            if($request->has('status')){
                $appsetting->status = 1;
            }else{
                $appsetting->status = 0;
            }
            $appsetting->message_ar = $request->message_ar;
            $appsetting->message_en = $request->message_en;
            $appsetting->nearest_distance = $request->nearest_distance;
            $appsetting->save();
        }else{
            if($request->has('status')){
                $request_data['status'] = 1;
            }else{
                $request_data['status'] = 0;
            }
            $request_data['message_ar'] = $request->message_ar;
            $request_data['message_en'] = $request->message_en;
            $request_data['nearest_distance'] = $request->nearest_distance;
            AppSetting::create($request_data);
        }
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('get_app_setting');
    }
}//
