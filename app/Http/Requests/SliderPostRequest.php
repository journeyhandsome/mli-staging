<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderPostRequest extends FormRequest
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
            'language_id' => 'required',
            'order' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
        ];
    }
    public function messages()
    {
        return [
            'language_id.required' => 'The language field is required.'
        ];
    }
}
