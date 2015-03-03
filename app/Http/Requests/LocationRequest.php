<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class LocationRequest extends Request {

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
			//
            'name' => 'required|min:2|max:60',
            'address1' => 'required',
            'province' => 'required|max:2',
            'city' => 'required',
            'postal' => 'required|alpha_num|size:6',
            'open_hour' => 'required|max:24',
            'close_hour' => 'required|max:24'
		];
	}

}
