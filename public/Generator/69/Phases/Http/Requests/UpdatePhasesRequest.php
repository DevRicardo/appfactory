<?php namespace Modules\Phases\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Phases\Entities\Phase;
use App\Traits\TraitRequest;


class UpdatePhasesRequest extends FormRequest {


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
            'name'=>'','description'=>'','peso_inicial'=>'','peso_final'=>'',
        ];
	}

}
