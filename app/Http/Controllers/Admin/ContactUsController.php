<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function index(){
        $messages = ContactUs::paginate(15);
        return view('admin.contactus.index',compact('messages'));
    }//end of index function

    public function destroy($id){
        $message = ContactUs::findOrFail($id);
        $message->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('contact-us.index');
    }//end of destroy function

}//end of class
