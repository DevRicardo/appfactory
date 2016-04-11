<?php namespace Modules\Ponds\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Ponds\Entities\Pond;
use App\Traits\TraitRequest;


class UpdatePondsRequest extends FormRequest {


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
            'phase_id'=>'','siembra'=>'','maximo'=>'','minimo'=>'',
        ];
	}

}
