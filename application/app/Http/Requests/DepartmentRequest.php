<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'name' => 'required|string|unique:departments,name,'. $this->department,
			'url_prefix' => 'string',
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
