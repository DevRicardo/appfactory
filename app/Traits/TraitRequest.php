<?php 
namespace App\Traits;

use App\Tools\Messages;
use Response;

trait TraitRequest
{


	private $message;
	public function __construct(Messages $message)
	{
        $this->message = $message;
	}

	/**
	 * Formatea los errores retornados por los request para que corespondan
	 * con el parametro que acepta el medodo emit de la clase App\Tools\Messages
	 * @param  array errores de los Request
	 * @return array
	 */
	public function formatErrorForView($errors)
	{
		# code...
		$errorFormatted = null;
		foreach ($errors as $key => $value) {
			# code...
			$errorFormatted[] = $value[0];
		}

		return $errorFormatted;
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
            $msjError = $this->message->emit(Messages::DANGER,$this->formatErrorForView($errors));  
        	return Response::json($msjError);
        }

        return $this->redirector->to($this->getRedirectUrl())
                                        ->withInput($this->except($this->dontFlash))
                                        ->withErrors($errors, $this->errorBag);
    }
}