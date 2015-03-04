<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CustomizationGroupRequest extends Request {

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
            'price' => 'numeric'
            // Gotta change the above to the new price validator service,
            // when that is done - erstwhile, it is numeric
		];
	}

}
