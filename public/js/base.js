
/*****************************************************
* Bloque para crear funciones genericas y generales  * 
*                                                    *
******************************************************/


/*
* Añade el evento onclick al elemento "active_search_bar"
* el cual activa la bara de busqueda en el layout home
*/
function searchBar(){

    // evento para actibar la barra de busqueda
	$(".active_search_bar").on('click', function(){

        $('#f_search').css('display','block');
        $('#search').focus();
        $('.brand-logo').css('display','none');
        $(".menu-large").css('display','none');

	});

    // evento para desactivar la barra de busqueda
	$(".i_search").on('click', function(){

        $('#f_search').css('display','none');
        $('#search').val("");
        $(".menu-large").css('display','block');
        $('.brand-logo').css('display','block');

	});

	
}







/*
* Funcion principal que se ejecuta apenas caraga el proyecto
*/
function main () {

	searchBar();
	
}


/*
* Evento para cargar la funcion principal
*/
$(document).on('ready', main);