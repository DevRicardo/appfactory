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

var baseUrl =  function () {
        return $('body').attr('data-url');
    }

var HelperServerPetition = function () {
	// body...

	//url base del proyecto
	
	
    // envia datos al servidor mediante ajax
    /*
    * formato del config = {url: , type:, async: , data: , dataType: ,success: , error:}
    * Para configurar la url antempoga siempre baseUrl()+'/'+<< ruta >> 
    */
	this.send = function (objForm, config) {
        
		// importando los datos del formulario
        var objCast = $(objForm);
		var method = objCast.attr('method');
		var rute = objCast.attr('action');
		var data = objCast.serialize();              

		var defaults = {
		    url: rute,
            type: method,
            async: true,
            data: data,
            dataType: "json",
            success: this.callBackSuccess,
            error: this.callBackError
	    }
	    /* Comprobamos que la configuracion este
        *  definida
        */
        if(typeof(config) != "undefined"){            
            // mesclamos la configuracion con los valores por
            // defecto
            $.extend(defaults, config);
        }
        // enviando datos 
	    $.ajax(defaults);		

	}
    // funcion por defecto cuando la peticion es exitosa
	this.callBackSuccess = function(data){}
    /*Funcion que se ejecutara si la petición ajax
      no se pueda realizar
    * @param: data (resultado que viene de la peticion al servidor)
    * @param: status (texto de error)
    * @param: objXHR  (objeto con toda la informacion de la peticion 
             {" objXHR.status, objXHR.statusText, objXHR.responseText"} )*/
	this.callBackError = function(data, status, objXHR ){}



	
}

// INICIALIZAR
var HelperServerPetition = new HelperServerPetition();