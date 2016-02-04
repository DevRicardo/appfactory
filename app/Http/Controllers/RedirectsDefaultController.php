<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


/*
* @Autor: Jose Alejandro Ricardo 
* @Version: 0.1.0
* @Creation: 2016-02-04
* @Updated: 2016-02-04
* @Description 
* Centraliza la indentificacion de errores http y otro tipo de redirecciones 
* genericas.
*/

class RedirectsDefaultController extends Controller
{
    //


    /*
    * Redirecciona a la vista dependiendo del error http que se la pase 
    * por parametro.
    * @params: $cod_error (404 ó 302 ó 505 ...)
    * @return: viws
    */
    public function error(Request $request,  $cod_error )
    {

         $view = "";     
         $result = array();
        // Recurso no encontrado
    	if($cod_error == "404"){
            
            $view = 'errors.404';
    	}

        // Error interno del servidor 
    	if($cod_error == "505"){
            
            $view = 'errors.505';
    	}

        //
    	if($cod_error == "503"){
            
            $view =  'errors.503';
    	}

    	if($request->ajax()){
            
            $result['vista'] = view($view)->render();
            return response()->json($result);            
        
    	}else{

    		return view($view);
    	}



    }
}
