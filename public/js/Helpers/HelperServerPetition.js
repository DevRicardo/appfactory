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

var HelperServerPetition = {
	// body...

    objForm: '',

	//url base del proyecto

     /* muestra y oculta un indicador de 
     * carga mientras dura la petición ajax
     * @param: action(show o hidden) -- inidica si mostrar u ocultar eñ preloader
     * @param  elementClass clase del contenedor del preload
     * @return: codigo html del preloader
     */
    actionPreloader: function(action, elementClass){

        var progress = $(".progress");
        var element = $("."+elementClass);

        if(action == "hidden"){           
           element.fadeOut( "slow" )
           element.remove();
        }else{
            if(action == "show"){

                var response = this.sendBasic(
                    {
                         url:  baseUrl()+'/componet/preloader',
                        type:  'GET',
                        data:  ''
                                  
                    }
                );
                response.done(function(data){ 
                    
                    // agrega el componente que retorna la peticion 
                    // al elemento que se pasa como parametro                   
                    $("."+elementClass).html(data.component); 

                });
            }else{
                alert("No hay parametros");
            }
        }
    },


    // accion que controla la habilitacion o no del boton de enviado de datos
    actionButtonSubmit: function(objForm, action){
        
        // recorre el formulario buscando los imput de tipo submit y los inhabilita
        objForm.find('input[type="submit"]').each(function(){
            if(action == "show"){
                $(this).removeAttr('disabled');
            }else{
                if(action == "hidden"){
                    
                  $(this).attr('disabled','disabled');
                    
                }
            }
        });
    },


    // envia datos al servidor basico
    /*
    * formato del config = {url: , type:,  data: }
    * Para configurar la url antempoga siempre baseUrl()+'/'+<< ruta >> 
    */
    sendBasic: function(config){
        var defaults = {
            url: '',
            type: '',
            data: '',
            dataType: 'json'
        }

        $.extend(defaults, config);
        var objResponse = $.ajax(defaults); 
        return objResponse;  
    },
	
	
    // envia datos al servidor mediante ajax
    /*
    * formato del config = {url: , type:, async: , data: , dataType: ,success: , error:}
    * Para configurar la url antempoga siempre baseUrl()+'/'+<< ruta >> 
    */
	send: function (objForm, config) {
        
		// importando los datos del formulario        
        var objCast = $(objForm);
		var method = objCast.attr('method');
		var rute = objCast.attr('action');
		//var data = objCast.serialize();    
        this.objForm = objCast;          
        var formData = new FormData($(objForm)[0]);
		var defaults = {
		    url: rute,
            type: method,
            async: true,
            data: formData,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: this.callBackSuccess,
            error: this.callBackError,
            complete:this.callBackComplete,
            beforeSend:this.callBackbeforeSend(objForm)
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

	},
    // funcion por defecto cuando la peticion es exitosa
	callBackSuccess: function(data){},
    /*Funcion que se ejecutara si la petición ajax
      no se pueda realizar
    * @param: data (resultado que viene de la peticion al servidor)
    * @param: status (texto de error)
    * @param: objXHR  (objeto con toda la informacion de la peticion 
             {" objXHR.status, objXHR.statusText, objXHR.responseText"} )*/
	callBackError: function(data, status, objXHR ){},

    // funcion por defecto cuando la peticion es completada
    callBackComplete: function(data, status, objXHR ){
        //alert('completo');
        
    },
    // funcion por defecto antes de enviar los datos
    callBackbeforeSend: function(data, status, objXHR , objForm){
        this.objForm.remove('.indicador_carga');
        HelperServerPetition.actionButtonSubmit(this.objForm, 'hidden');
        this.objForm.prepend('<div class="indicador_carga" ></div>');
        HelperServerPetition.actionPreloader('show','indicador_carga');
    }





   


	
}
