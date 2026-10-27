<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialPostRequest extends FormRequest
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
            'nationality_id' => 'required',
            'campus_id' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
            'language_id' => 'required',
            'title' => 'required',
            'text' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nationality_id.required' => 'The nationality field is required.',
            'campus_id.required' => 'The campus field is required.',
            'language_id.required' => 'The language field is required.'
        ];
    }
}
