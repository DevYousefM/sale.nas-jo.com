<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\General;
use App\Traits\CustomFunctions;
use Carbon\Carbon;
use App\Http\Requests\Admin\webSiteSettingRequest;

class WebSiteSettingController extends Controller
{
    use CustomFunctions;

    public function index(){
        $setting = General::first();
        return view('admin.websitesetting.index',compact('setting'));
    }//end of index function

    public function update(webSiteSettingRequest $request){
        $request_data = $request->except(['logo','icon']);
        if($request->has('logo')){
            $request_data['logo'] = $this->StoreFiles($request->logo , 'assets/files/website/setting' , 'logo_'.strtotime(Carbon::now()));
        }
        if($request->has('icon')){
            $request_data['icon'] = $this->StoreFiles($request->icon , 'assets/files/website/setting' , 'icon_'.strtotime(Carbon::now()));
        }
        $setting = General::first();
        if($setting){
            $setting->update($request_data);
            return view('admin.websitesetting.index',compact('setting'));
        }else{
            $setting = General::create($request_data);
            return view('admin.websitesetting.index',compact('setting'));
        }
    }//end of update function

}//end of class
