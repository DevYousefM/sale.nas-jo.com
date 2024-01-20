<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }/* end of getLogin function */

    public function login(Request $request){

        if(auth()->guard('admin')->attempt(['username'=>$request->input('email-username') , 'password'=>$request->input('password')])){
            return redirect()->route('admin.dashboard');
        }elseif(auth()->guard('admin')->attempt(['email'=>$request->input('email-username') , 'password'=>$request->input('password')])){
            return redirect()->route('admin.dashboard');
        }
        else{
            return back()->withErrors(['error' => __('admin.login_failed')]);
        }

    }/* end of login function  */

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('get.admin.login');
    }
}//end of class
