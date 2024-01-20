<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Policy;

class PrivacyPolicyController extends Controller
{
    public function index(){
        $policy = Policy::first();
        return view('admin.policy.index',compact('policy'));
    }//end of index function

    public function update(Request $request){
        $request_data = $request->all();
        $policy = Policy::first();
        if($policy){
            $policy->update($request_data);
            return view('admin.policy.index',compact('policy'));
        }else{
            $policy = Policy::create($request_data);
            return view('admin.policy.index',compact('policy'));
        }
    }//end of update function

}//end of class
