<?php 
namespace App\Tools;

/**
* Formatea la salida de informacion de un controlador a la vista 
* cuando la peticion se hace via ajax
*/
class Messages
{

    /*
    * Tipos de mensajes permitidos
    */
	const INFO = "info";
    const DANGER = "danger";
    const SUCCESS = "success";
    const WARNING = "warning";
	

	/*
	* Formatea y define el tipo de mensaje a enviar al cliente
	*
	* @param type ( es el tipo de mensaje, solo pondran ser de los tipos definidos en esta clase ) 
	* @param message (Contenido del mensaje a mostrar)
	* @param data (resultado a enviar)
	* @param format (puede ser json y html)
	* @return array
	*/
	public function emit($type, $message, $data = [] , $format = "json")
	{
        return ['type' => $type, 'msg' => $message, 'data' => $data];
	}

}
