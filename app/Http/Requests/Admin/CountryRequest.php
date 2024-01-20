<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            $rules = array();
            foreach (config('translatable.locales') as  $lang) {
                $rules["name:$lang"] = "required|unique:country_translations,name";
                $rules["currency:$lang"] = "required|unique:country_translations,currency";
            }
            $rules['photo'] = 'required';
        }else{
            $rules = array();
            foreach (config('translatable.locales') as  $lang) {
                $rules["name:$lang"] = "required|unique:country_translations,name,".$this->request->get('id:'.$lang);
                $rules["currency:$lang"] = "required|unique:country_translations,currency,".$this->request->get('id:'.$lang);
            }
        }
        $rules['code'] = 'required';

        return $rules;
    }//end of rules function

    public function messages(){
        $messages = array();
        foreach (config('translatable.locales') as  $lang) {
            $messages["name:$lang".".required"] = __('admin.name_'.$lang.'_required');
            $messages["name:$lang".".unique"] = __('admin.name_'.$lang.'_unique');
            $messages["currency:$lang".".required"] = __('admin.currency_'.$lang.'_required');
            $messages["currency:$lang".".unique"] = __('admin.currency_'.$lang.'_unique');
        }
        $messages['code.required'] = __('admin.code_required');
        $messages['photo.required'] = __('admin.photo_required');
        return $messages;
    }//end of messages

}//end of class
