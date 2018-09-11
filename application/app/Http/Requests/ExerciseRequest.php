<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExerciseRequest extends FormRequest
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
			'poi_id' => 'required|string|unique:exercises,poi_id,,'. $this->exercise,
			'name' => 'required|string',
			'content' => 'required|string',
			'picture' => 'string',
			'answer' => 'required|string'
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
