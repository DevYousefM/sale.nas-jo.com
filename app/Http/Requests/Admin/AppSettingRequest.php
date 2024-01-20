<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AppSettingRequest extends FormRequest
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
   
        $rules = array();
        foreach (config('translatable.locales') as  $lang) {
            $rules["message_$lang"] = "required";
        }
        return $rules;
    }//end of rules function

    public function messages(){
        $messages = array();
        foreach (config('translatable.locales') as  $lang) {
            $messages["message_$lang".".required"] = __('admin.message_'.$lang.'_required');
        }
        return $messages;
    }//end of messages

}//end of class
