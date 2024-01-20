<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(){
        $aboutus = AboutUs::first();
        return view('admin.aboutus.index',compact('aboutus'));
    }//end of index function

    public function update(Request $request){
        $request_data = $request->all();
        $aboutus = AboutUs::first();
        if($aboutus){
            $aboutus->update($request_data);
            return view('admin.aboutus.index',compact('aboutus'));
        }else{
            $aboutus = AboutUs::create($request_data);
            return view('admin.aboutus.index',compact('aboutus'));
        }
    }//end of update function

}//end of class

