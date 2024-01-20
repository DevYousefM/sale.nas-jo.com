<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\General;
use Illuminate\Http\Request;

class WebSiteController extends Controller
{
    public function index(){
        $setting = General::first();
        return view('admin.setting.index',compact('setting'));
    }//end of index function

    public function update(Request $request){
        $request_data = $request->all();
        $setting = General::first();
        if($setting){
            $setting->update($request_data);
            return view('admin.setting.index',compact('setting'));
        }else{
            $setting = General::create($request_data);
            return view('admin.setting.index',compact('setting'));
        }
    }//end of update function

}//end of class
