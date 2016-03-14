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
				    	url:'$_table_$/'+id,
				    	type:'DELETE',
				    	data:''
                   });
    response.done(function(data){

        HelperMessage.displayNotyOn(data);
        $("#_"+id).addClass('animated zoomOutDown');

    });
	
}