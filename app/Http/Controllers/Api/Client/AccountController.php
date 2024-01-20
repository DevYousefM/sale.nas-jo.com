<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Traits\GeneralTrait;
use App\Traits\CustomFunctions;
use Carbon\Carbon;

class AccountController extends Controller
{
    use GeneralTrait;
    use CustomFunctions;

    public function updateAccount(Request $request){
        $client = auth()->guard('client-api')->user();
        $rules = [
            'country_id' => 'required',
            'city_id' => 'required',
            'type_account' => 'required',
            'username' => 'required|unique:clients,username,'.$client->id,
            'fullname' => 'required',
            'gender' => 'required',
            'mobile' => 'required|unique:clients,mobile,'.$client->id,
            'email' => 'required',
        ];
        $messages = [
            'country_id.required' =>  __('api.country_id_required'),
            'city_id.required' =>  __('api.city_id_required'),
            'type_account.required' =>  __('api.type_account_required'),
            'username.required' =>  __('api.username_required'),
            'fullname.required' =>  __('api.fullname_required'),
            'gender.required' =>  __('api.gender_required'),
            'mobile.required' =>  __('api.mobile_required'),
            'email.required' =>  __('api.email_required'),
            'password.required' =>  __('api.password_required'),
        ];
        $validator = Validator::make($request->all() , $rules,$messages);
        if($validator->fails()){
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code,$validator);
        }

        $request_data = $request->except('password','password_confirmation','photo');
        if($request->has('photo')){
            $request_data['photo'] = $this->StoreFiles($request->photo , 'assets/files/client/images' , 'client_'.strtotime(Carbon::now()));
        }
        if($request->has('password')){
            $request_data['password'] = bcrypt($request->password);
        }

        $client->update($request_data);
        return $this->returnSuccessMessage(__('api.updated_successfully'));
        // $client->update($request_data);

    }//end of update account function


    public function getProfile(){
        $client = auth()->guard('client-api')->user();
        $client->country;
        $client->city;
        return $this->returnData('data',$client);
    }//end of contact us function

}//end of class
