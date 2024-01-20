<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method = $this->request->get('_method');
        if($method != 'put'){
            return [
                'country_id' =>'required',
                'city_id' =>'required',
                'username' =>'required|unique:clients,username',
                'gender' =>'required',
                'mobile' =>'required|unique:clients,mobile',
                'email' =>'required|unique:clients,email',
                'password' =>'required',
            ];
        }else{
            return [
                'country_id' =>'required',
                'city_id' =>'required',
                'username' =>'required|unique:clients,username,'.$this->request->get('id'),
                'gender' =>'required',
                'mobile' =>'required|unique:clients,mobile,'.$this->request->get('id'),
                'email' =>'required|unique:clients,email,'.$this->request->get('id'),
            ];
        }//end else
    }//end of rules functions


    public function messages(){
        return [
            'country_id.required' => __('admin.country_id_required'),
            'city_id.required' => __('admin.city_id_required'),
            'username.required' => __('admin.username_required'),
            'username.unique' => __('admin.username_unique'),
            'gender.required' => __('admin.gender_required'),
            'mobile.required' => __('admin.mobile_required'),
            'mobile.unique' => __('admin.mobile_unique'),
            'email.required' => __('admin.email_required'),
            'email.unique' => __('admin.email_unique'),
            'password.required' => __('admin.password_required'),
        ];
    }//end of messages functions

}//end of class
