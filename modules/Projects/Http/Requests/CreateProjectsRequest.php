<?php namespace Modules\Projects\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Projects\Entities\Project;
use App\Traits\TraitRequest;



class CreateProjectsRequest extends FormRequest {

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
            'image' => 'mimes:jpeg,bmp,png',
            'name' => 'required|alpha_dash|max:120|unique:projects',
            'description' => 'required|max:250',
            'categorie_id' => 'required|numeric',
            'state_id' => 'required|numeric'
        ];
	} 


	


    /**
    * Formatea la salida de los mensajes al formato estandar 
    * definido por la clase App\Tools\Message
    *
    * @param  array  $errors
    * @return array  $errors
    */
    public function changeFormatError($error){
        $formatError = array();

        return $formatError;
    }

       



}
