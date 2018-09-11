<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentGroupRequest extends FormRequest
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
			'url_idr' => 'required|string|unique:student_groups,url_id,' . $this->student_group,
			'name' => 'required|string',
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
