<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        $rules['photo'] = 'required';
        return $rules;
    }//end of rules function

    public function messages(){
        $messages = array();
        $messages['photo.required'] = __('admin.photo_required');
        return $messages;
    }//end of messages

}//end of class
