<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                'desc:ar' => 'required',
                'desc:en' => 'required',
                'title:ar' => 'required',
                'title:en' => 'required',
                'feature_post' =>'اعلانات مميزة',
                'photo' => 'required',
                'mobile' => 'required',
                'category_id' => 'required',
                'sub_category_id' => 'required',
                'country_id' => 'required',
                'city_id' => 'required',
                'price' => 'required',
                'currency' => 'required',
                'photos' => 'required',
                'client_id' => 'required',
                'features.*'=>'required',
                'type_account' => 'required',
            ];
        }else{
            return [
                'desc:ar' => 'required',
                'desc:en' => 'required',
                'title:ar' => 'required',
                'title:en' => 'required',
                'mobile' => 'required',
                'category_id' => 'required',
                'sub_category_id' => 'required',
                'country_id' => 'required',
                'city_id' => 'required',
                'price' => 'required',
                'currency' => 'required',
                'client_id' => 'required',
                'features.*'=>'required',
            ];
        }//end else
    }//end of rules functions


    public function messages(){
        return [
            'type_account.required' =>  __('api.type_account_required'),
            'title:ar.required' =>  __('admin.title_ar_required'),
            'title:en.required' =>  __('admin.title_en_required'),
            'desc:ar.required' =>  __('admin.desc_ar_required'),
            'desc:en.required' =>  __('admin.desc_en_required'),
            'photo.required' =>  __('admin.photo_required'),
            'mobile.required' =>  __('admin.mobile_required'),
            'status.required' =>  __('admin.status_required'),
            'category_id.required' =>  __('admin.category_id_required'),
            'sub_category_id.required' =>  __('admin.sub_category_id_required'),
            'country_id.required' =>  __('admin.country_id_required'),
            'city_id.required' =>  __('admin.city_id_required'),
            'price.required' =>  __('admin.price_required'),
            'currency.required' =>  __('admin.currency_required'),
            'photos.required' =>  __('admin.photos_required'),
            'client_id.required' =>  __('admin.client_required'),
            'features.*.required'=> __('admin.features_required'),
        ];
    }//end of messages functions

}//end of class
