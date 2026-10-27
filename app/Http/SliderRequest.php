<?php namespace App\Http;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'language_id'=> 'required:sliders,language_id,'.$this->get('id'),
			'image' => 'required|mimes:jpg,png,jpeg',
           	'order'=> 'unique:sliders,order,'.$this->get('language_id')
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}

