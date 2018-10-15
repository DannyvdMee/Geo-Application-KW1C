<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
			'email' => 'required|email|unique:users.email,' . $this->user,
			'username' => 'required|string|unique:users.username.' . $this->user,
			'firstname' => 'required|max:20',
			'lastname' => 'required|max:30',
			'department' => 'required|max:40',
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
