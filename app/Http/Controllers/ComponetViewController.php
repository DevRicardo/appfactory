<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

/*
* Esta clase permite acceder a siertos componentes 
* predefinidos de interfaz grafica para ser incluidos
* mediante ajax en las vistas.
*/

class ComponetViewController extends Controller
{
    //
    public $className;


    public function __construct()
    {
    	$this->className  = "ComponetViewController";
    }

    /*
    * permite seleccionar el componente
    * @param: component -- nombre del componente a mostrar
    */
    public function select($component)
    {
    	$function = $component;
    	dd(__NAMESPACE__ .'\\'.$this->className.'\\'.$function);
        if(function_exists(__NAMESPACE__ .''.$function))
        {
            return call_user_func($component);   
        }else{
        	$result['component'] = view('errors.404')->render();
    	    return response()->json($result);
        }
  
    }



    /******************************************************
    *                                                     *
    *     BLOQUE PARA LAS FUNCIONES PARA COMPONENTES      *
    *                                                     *
    ******************************************************/


    // Componente que muestra una linea queindica que la 
    // app esta realizando una ccion.
    public function preloader()
    {
    	$result['component'] = view('partials.componets.preloader')->render();
    	return response()->json($result);
    }


     

}
