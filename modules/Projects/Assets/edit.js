/******************************************************
*                                                     *
*  BLOQUE PARA LAS FUNCIONES DE ASIGNACION DE EVENTOS *
*                                                     *
******************************************************/


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
 
var successCreate = function(data)
{
	HelperServerPetition.actionButtonSubmit(HelperServerPetition.objForm, 'show');
	HelperServerPetition.actionPreloader('hidden','indicador_carga');
	HelperMessage.displayNotyOn(data);
	if(data.type == "success")
	{
        HelperForm.clean(HelperServerPetition.objForm);
	}
	
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