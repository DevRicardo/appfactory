/******************************************************
*                                                     *
*  BLOQUE PARA LAS FUNCIONES DE ASIGNACION DE EVENTOS *
*                                                     *
******************************************************/

// Evento para el boton con class crear |  |
function eventCreate () 
{
	// Formulario en la vista create con la class="create"
	$(".create").on('submit', function(event) {
		// evitando el comportamiento por defecto del boton type submit
		event.preventDefault();		
		var objElement = this;
		// validacion de campos
		HelperValidation.execute(objElement);

		HelperServerPetition.send(objElement,{
			success: successCreate,
			error:   errorCreate
		});
	});
}











/************************************************************************
*                                                                       *
*  BLOQUE PARA LAS FUNCIONES DE DE PROCESO DE DATOS DE LA PETICION AJAX *
*                                                                       *
*************************************************************************/

// Funcion que se ejecutara despues de que la 
// petición ajax se realize con exito
// @param: data (resultado que viene de la peticion al servidor)
 
var successCreate = function(data)
{
	HelperServerPetition.actionButtonSubmit(HelperServerPetition.objForm, 'show');
	HelperServerPetition.actionPreloader('hidden','indicador_carga');

}


// Funcion que se ejecutara si la petición ajax
// no se pueda realizar
// @param: data (resultado que viene de la peticion al servidor)
// @param: status (texto de error)
// @param: objXHR  (objeto con toda la informacion de la peticion 
//	       {" objXHR.status, objXHR.statusText, objXHR.responseText"} )
var errorCreate = function(data, status, objXHR)
{
	// Proceso fallido ...
	HelperServerPetition.actionButtonSubmit(HelperServerPetition.objForm, 'show');
	HelperServerPetition.actionPreloader('hidden','indicador_carga');
}







/************************************************************************
*                                                                       *
*      BLOQUE PARA LAS FUNCIONES ADICIONALES Y DE UTILIDADES            *
*                                                                       *
*************************************************************************/