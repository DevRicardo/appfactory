/**********************************
*                                 *
*           ADD FIELDS            *
*                                 *
**********************************/

function addField()
{	
		var size = $(".card-panel .row_field").size();
		var response = HelperServerPetition.sendBasic(
                    {
                         url:  baseUrl()+'/componet/campotablebd',
                        type:  'GET',
                        data:  'size='+size                                  
                    }
                );
        response.done(function(data){                    
            // agrega el componente que retorna la peticion 
            // al elemento que se pasa como parametro                   
           $(".card-panel").append(data.component)
           

        })    
}   


function createField () {
  	// body...
  	$(".create_field").on('submit', function(e){
       e.preventDefault();
       console.log($(this).serialize());
  	});
  }  