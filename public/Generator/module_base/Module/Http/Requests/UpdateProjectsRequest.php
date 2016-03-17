<?php namespace Modules\_model_plural_\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\_model_plural_\Entities\_model_;
use App\Traits\TraitRequest;


class Update_model_plural_Request extends FormRequest {


	use TraitRequest;

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
            _rules_
        ];
	}

}
