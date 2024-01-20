<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
                $rules["name:$lang"] = "required|unique:sub_category_translations,name";
            }
        }else{
            $rules = array();
            foreach (config('translatable.locales') as  $lang) {
                $rules["name:$lang"] = "required|unique:sub_category_translations,name,".$this->request->get('id:'.$lang);
            }
        }
        $rules['categories'] = 'required';
        $rules['features'] = 'required';
        return $rules;
    }//end of rules function

    public function messages(){
        $messages = array();
        foreach (config('translatable.locales') as  $lang) {
            $messages["name:$lang".".required"] = __('admin.name_'.$lang.'_required');
            $messages["name:$lang".".unique"] = __('admin.name_'.$lang.'_unique');
        }
        $messages['categories.required'] = __('admin.category_required');
        $messages['features.required'] = __('admin.features_required');
        return $messages;
    }//end of messages

}//end of class
