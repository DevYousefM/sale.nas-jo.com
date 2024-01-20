<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Validator;

class ContactUsController extends Controller
{
    use GeneralTrait;

    public function store(Request $request){
        $rules = [
            'fullname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'message' => 'required',
        ];
        $messages = [
            'fullname.required' =>  __('api.fullname_required'),
            'email.required' =>  __('api.email_required'),
            'address.required' =>  __('api.address_required'),
            'message.required' =>  __('api.message_required'),
        ];
        $validator = Validator::make($request->all() , $rules,$messages);
        if($validator->fails()){
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code,$validator);
        }
        ContactUs::create($request->all());
        return $this->returnSuccessMessage(__('api.created_successfully'),'s000');
    }//end of store function

}//end of class
