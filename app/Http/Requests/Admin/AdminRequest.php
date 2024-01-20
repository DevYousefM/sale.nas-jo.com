<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
                'username' =>'required|unique:admins,username',
                'mobile' =>'required|unique:admins,mobile',
                'email' =>'required|unique:admins,email',
                'password' =>'required|min:6|max:20',
            ];
        }else{
            return [
                'username' =>'required|unique:admins,username,'.$this->request->get('id'),
                'mobile' =>'required|unique:admins,mobile,'.$this->request->get('id'),
                'email' =>'required|unique:admins,email,'.$this->request->get('id'),
                'password' =>'min:6|max:20',

            ];
        }//end else
    }//end of rules functions


    public function messages(){
        return [
            'username.required' => __('admin.username_required'),
            'username.unique' => __('admin.username_unique'),
            'mobile.required' => __('admin.mobile_required'),
            'mobile.unique' => __('admin.mobile_unique'),
            'email.required' => __('admin.email_required'),
            'email.unique' => __('admin.email_unique'),
            'password.required' => __('admin.password_required'),
        ];
    }//end of messages functions

}//end of class
