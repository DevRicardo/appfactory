/*
* @Autor: Jose Alejandro Ricardo 
* @Version: 0.1.0
* @Creation: 2016-02-04
* @Updated: 2016-02-04
* @Description 
* Ayudante para el envio de peticiones al servidor, se caracteriza por
* resibir el objeto del formulario y estraer de el los datos para enviar
* la peticion
*/
var HelperServerPetition = function () {
	// body...
	
    // evia datos al servidor mediante ajax
	this.send = function (objForm, config) {

		var defaults = {
		    url: '/erros/404',
            type: 'GET',
            async: true,
            data: '',
            dataType: "json",
            success: callBackSuccess,
            error: callBackError,
	    }

	    /* Comprobamos que la configuracion este
        *  definida
        */
        if(typeof(config) != "undefined"){
            
            // mesclamos la configuracion con los valores por
            // defecto
            $.extend(defaults, config);

        }	    

	    $.ajax(defaults);
		

	}
}