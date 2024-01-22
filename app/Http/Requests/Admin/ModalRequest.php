<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ModalRequest extends FormRequest
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
        $rules = [];

        foreach (config('translatable.locales') as $lang) {
            if ($method != 'put') {
                $rules["brand:$lang"] = "required";
                $rules["modal:$lang"] = "required";
            } else {
                $rules["brand:$lang"] = "required|" . $this->request->get("id:$lang");
                $rules["modal:$lang"] = "required|" . $this->request->get("id:$lang");
            }
        }
        return $rules;
    } //end of rules function

    public function messages()
    {
        $messages = array();
        foreach (config('translatable.locales') as  $lang) {
            $messages["modal:$lang" . ".required"] = __('admin.modal_' . $lang . '_required');
            $messages["brand:$lang" . ".required"] = __('admin.brand_' . $lang . '_required');
        }
        return $messages;
    } //end of messages

}//end of class
