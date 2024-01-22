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
            $rules["brand:$lang"] = "required";
        }
        $rules["modals"] = "required|array|min:1";

        return $rules;
    }

    public function messages()
    {
        $messages = [];

        foreach (config('translatable.locales') as $lang) {
            $messages["brand:$lang.required"] = __('admin.brand_' . $lang . '_required');
            $messages["modal.required"] = __('admin.modal_' . $lang . '_required');
            $messages["modal.array"] = __('admin.modal_' . $lang . '_array');
            $messages["modal.min"] = __('admin.modal_' . $lang . '_min');
        }

        return $messages;
    }
}//end of class
