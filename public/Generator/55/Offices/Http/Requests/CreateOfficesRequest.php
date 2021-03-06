<?php namespace Modules\Offices\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Offices\Entities\Office;
use App\Traits\TraitRequest;



class CreateOfficesRequest extends FormRequest {

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

		    'departamento'=>'required','numero'=>'required','edificio'=>'required',
        ];
	} 



}
