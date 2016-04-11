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
      route:   'parameters',
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
