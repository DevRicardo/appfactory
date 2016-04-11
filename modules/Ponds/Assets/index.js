/*******************************************************************
*                                                                  *
*  BLOQUE PARA LAS FUNCIONES DE ASIGNACION DE EVENTOS  Y FUNCIONES *
*                                                                  *
********************************************************************/
function dropdown() {
	// body...
	$('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false
    }
  );
}



// Evento para el boton con class crear |  |
function eventSearch () 
{
  // Formulario en la vista create con la class="create"
  $(".search").on('submit', function(event) {
    // evitando el comportamiento por defecto del boton type submit
    event.preventDefault();   
    var objElement = this;
    loadData({
      route:   'ponds',
      nextpage:'1',
      'data':$(objElement).serialize()
    });


  });
}









/************************************************************************
*                                                                       *
*  BLOQUE PARA LAS FUNCIONES DE DE PROCESO DE DATOS DE LA PETICION AJAX *
*                                                                       *
*************************************************************************/
function redirect(element, id)
{
    var url = baseUrl();
    var element = $(element);
    var action = element.data('action');
    var model = element.data('model');
    if(action == 'edit'){
        url = baseUrl()+"/"+model+"/"+id+"/"+action;
    }

    if(action == 'show'){
        url = baseUrl()+"/"+model+"/"+id;
    }
    
    
    $(location).attr('href',url);
}


// Funcion que se ejecutara despues de que la 
// petición ajax se realize con exito
// @param: data (resultado que viene de la peticion al servidor)
 
var successCreate = function(data)
{
  HelperServerPetition.actionButtonSubmit('show');
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
//         {" objXHR.status, objXHR.statusText, objXHR.responseText"} )
var errorCreate = function(data, status, objXHR)
{
  // Proceso fallido ...
  HelperServerPetition.actionButtonSubmit('show');
  HelperServerPetition.actionPreloader('hidden','indicador_carga');
}

