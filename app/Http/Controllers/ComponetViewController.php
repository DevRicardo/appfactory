<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
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
    public function select(Request $request, $component)
    {
    	$function = $component;
    	//dd(__NAMESPACE__ .'\\'.$this->className.'\\'.$function);
        if(method_exists(__NAMESPACE__ .'\\'.$this->className, $function))
        {
        	$component = [__NAMESPACE__ .'\\'.$this->className,$function];
            return call_user_func($component, $request);   
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
    	$result['component'] = view('partials.components.preloader')->render();
    	return response()->json($result);
    }

    //Componente que muestra una fila para añadir campos en una tabla
    public function campoTableBd(Request $request)
    {
        $pos = $request->size;
        $result['component'] = view('partials.components.campotablebd')->with(['pos'=>$pos])->render();
        return response()->json($result);
    }


     

}
