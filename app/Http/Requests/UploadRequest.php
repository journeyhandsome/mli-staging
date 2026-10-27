<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
            'name' => 'required',
            'file' => 'max:5000|required|mimes:doc,docx,xlx,xls,pdf|unique:upload_files'
        ];
    }
    public function messages()
    {
        return [
            'file.max' => 'The document may not be greater than 5MB (5000 KB).'
        ];
    }
}
