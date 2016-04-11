/******************************************************
*                                                     *
*  BLOQUE PARA LAS FUNCIONES DE ASIGNACION DE EVENTOS *
*                                                     *
******************************************************/
/*
* 
*
*
*/
function eventDelete()
{
	$(".delete").on('click', function(){
        var id = $(this).data('id');
        HelperMessage.showNoty("¿ Are you sure of delete ?","confirm",destroy, id);

	});
}


/************************************************************************
*                                                                       *
*  BLOQUE PARA LAS FUNCIONES DE DE PROCESO DE DATOS DE LA PETICION AJAX *
*                                                                       *
*************************************************************************/
function destroy(id)
{
    var response = HelperServerPetition.sendBasic({
<<<<<<< HEAD:modules/Books/Assets/delete.js
				    	url:'books/'+id,
=======
				    	url:'offices/'+id,
>>>>>>> appf/ts1:public/Generator/55/Offices/Assets/delete.js
				    	type:'DELETE',
				    	data:''
                   });
    response.done(function(data){

        HelperMessage.displayNotyOn(data);
        $("#_"+id).addClass('animated zoomOutDown');

    });
	
}
