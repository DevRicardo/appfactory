<?php namespace Modules\Projects\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Projects\Entities\Project;
use App\Tools\Messages;
use Response;


class CreateProjectsRequest extends FormRequest {


    private $message;
	public function __construct(Messages $message)
	{
        $this->message = $message;
	}

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
            'name' => 'required|alpha_dash|max:120',
            'description' => 'required|max:250',
            'categorie_id' => 'required|numeric',
            'state_id' => 'required|numeric'
        ];
	} 


	/**
	* Redefiniendo el metodo de la clase Illuminate\Foundation\Http\FormRequest
    * Get the proper failed validation response for the request.
    *
    * @param  array  $errors
    * @return \Symfony\Component\HttpFoundation\Response
    */
    public function response(array $errors)
    {
    	$msjError  = null;

        if ($this->ajax() || $this->wantsJson()) {
            $msjError = $this->message->emit(Messages::DANGER,$errors);  
        	return Response::json($msjError, 422);
        }

        return $this->redirector->to($this->getRedirectUrl())
                                        ->withInput($this->except($this->dontFlash))
                                        ->withErrors($errors, $this->errorBag);
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
