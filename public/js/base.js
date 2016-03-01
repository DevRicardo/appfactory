
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
*
* Carga una lista con paginado y la renderiza en un elemento
* que se le pase como parametro
*
* @param config  {route:'valor',pagenew:'valor',element:valor}
*
*-------------------------------------------------------------
* element- este elemento que coresponde al id o clase donde se va 
* a renrerizar el resultado de la consulta pr defecto esta formado
* por la palabra list_ concatenandole el nombre del alias del router
* y es una clase
* ejemplo: list_projects
*/

function loadData(config)
{
    var defaults = {
        route:'',
        nextpage:'',
        element:'.list_',
        callback:defaultLoad
    }

    $.extend(defaults, config);
    var element = defaults.element+defaults.route;

    if($(element).length > 0)
    {        
        var objElement = $(element);
        var page = "";
        if(typeof defaults.nextpage != "undefined"){
            page = "?page="+defaults.nextpage;
        }
        
        var request = HelperServerPetition.sendBasic({
                                   url:  baseUrl()+'/'+defaults.route+'/list'+page,
                                   type:  'GET',
                                   data:'' 
                      }, objElement);

        request.done(function(msj){
            
            objElement.html(msj.vista);
            HelperServerPetition.actionPreloader('hidden','indicador_carga');
            //eventDelete();
            defaults.callback();

        });

    }
}

function defaultLoad()
{
    console.log("default load");
}

function eventListenPaginate()
{
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();


        var npage = $(this).attr('href').split("page=")[1];
        var dataUrl = $(this).attr('href').split("/");
        var controller = dataUrl[4];

        
        loadData({
            route:   controller,
            nextpage:npage
        });
        
    });
}





/*
* Funcion principal que se ejecuta apenas caraga el proyecto
*/
function main () {

    /*
    * Inicializa el campo de busqueda en el hedaer
    */
	searchBar();


    /*
    * Funcion principal que detecta las activaciones 
    * de los pagonadores
    */
    eventListenPaginate();
	
}


/*
* Evento para cargar la funcion principal
*/
$(document).on('ready', main);