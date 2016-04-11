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









/************************************************************************
*                                                                       *
*  BLOQUE PARA LAS FUNCIONES DE DE PROCESO DE DATOS DE LA PETICION AJAX *
*                                                                       *
*************************************************************************/
function redirect(element, id)
{
<<<<<<< HEAD:modules/Books/Assets/index.js
    var element = $(element);
    url = '';
    alert(baseUrl());
    //$(location).attr('href',url);
=======
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
>>>>>>> appf/ts1:public/Generator/55/Offices/Assets/index.js
}
