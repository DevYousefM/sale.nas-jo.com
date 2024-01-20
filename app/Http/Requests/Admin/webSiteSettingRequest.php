<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class webSiteSettingRequest extends FormRequest
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
        return [
            'title:en' => 'required',
            'title:ar' => 'required',
            'desc:en' => 'required',
            'desc:ar' => 'required',
            'location:en' => 'required',
            'location:ar' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ];
    }

    public function messages(){
        return [
            'title:en.required' => __('admin.title_en_required'),
            'title:ar.required' => __('admin.title_ar_required'),
            'desc:en.required' => __('admin.desc_en_required'),
            'desc:ar.required' => __('admin.desc_ar_required'),
            'location:en.required' => __('admin.location_en_required'),
            'location:ar.required' => __('admin.location_ar_required'),
            'email.required' => __('admin.email_required'),
            'mobile.required' => __('admin.mobile_required'),
        ];
    }

}//end of class
