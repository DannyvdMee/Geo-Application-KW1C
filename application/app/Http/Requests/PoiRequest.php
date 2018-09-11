<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoiRequest extends FormRequest
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
			'url_id' => 'required|string|unique:poi,url_id,'. $this->poi,
			'type' => 'required|string',
			'name' => 'required|string',
			'description' => 'required|string',
			'longitude' => 'required',
			'latitude' => 'required',
			'hint' => 'string',
		];
	}

	public function messages()
	{
		return [
			'*.required' => 'Field is required.',
			'*.unique' => 'Event name already exists.'
		];
	}
}
