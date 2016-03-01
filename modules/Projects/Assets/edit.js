/******************************************************
*                                                     *
*  BLOQUE PARA LAS FUNCIONES DE ASIGNACION DE EVENTOS *
*                                                     *
******************************************************/
var objetPetition = HelperServerPetition;


function eventUpdate()
{
	// Formulario en la vista create con la class="create"
	$(".update").on('submit', function(event) {

		event.preventDefault();
		var objElement = this;
		// validacion de campos 
		if(HelperValidation.execute(objElement)){			
            //objetPetition.objForm = objElement;
			objetPetition.send(objElement,{
		    	success: successUpdate,
		    	error:   errorUpdate
		    });
		}




	});
}


function showAndHideImage()
{
	$('.update .card-image').on('click', function(){
        var originStyle = "height:100px";
        var jqueryObjElement = $(this);

        if(jqueryObjElement.attr('class').search('expanded') > 0)
        {
            jqueryObjElement.attr('style',originStyle);
            jqueryObjElement.removeClass("expanded");  
            $('.close-preview').css('display', 'none');     
        }
        else
        {
        	jqueryObjElement.removeAttr('style');
            jqueryObjElement.addClass("expanded"); 
            $('.close-preview').css('display', 'block'); 
        }       
        

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
 
var successUpdate = function(data)
{
	
	objetPetition.actionButtonSubmit('show');
	objetPetition.actionPreloader('hidden','indicador_carga');
	HelperMessage.displayNotyOn(data);
	
	
}


// Funcion que se ejecutara si la petición ajax
// no se pueda realizar
// @param: data (resultado que viene de la peticion al servidor)
// @param: status (texto de error)
// @param: objXHR  (objeto con toda la informacion de la peticion 
//	       {" objXHR.status, objXHR.statusText, objXHR.responseText"} )
var errorUpdate = function(data, status, objXHR)
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