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



function addAttr(element) {
     // body...

     $("#field_select").val($(element).data('id'));
     var actual = $("#attributes_"+$(element).data('id')).val();
     var text_value = $("#text_value").val(actual);
     $('#modal1').openModal();
} 


function addValidation(element) {
     // body...

     $("#field_select").val($(element).data('id'));
     var actual = $("#validations_"+$(element).data('id')).val();
     var text_value = $("#v_text_value").val(actual);
     $('#modal2').openModal();
} 

function addValueModalAttr () {
    // body...
    var type = $("#m_type");
    var value = $("#m_value");
    var text_value = $("#text_value");
    var select = $("#field_select");

    text_value.append(type.val()+"='"+value.val()+"' | ");
    
    value.val("");
    $("#attributes_"+select.val()).val(text_value.val());

  } 


  function addValueModalValidation () {
    // body...
    var value = $("#v_value");
    var text_value = $("#v_text_value");
    var select = $("#field_select");

    text_value.val(value.val());
    
    value.val("");
    $("#validations_"+select.val()).val(text_value.val());

  }  




  /******************************************************
  *                                                     *
  *                 FUNCIONES DEL GENERADOR             *
  *                                                     *
  *                                                     *
  *******************************************************/

   function startModule (project, tableid, nametable) {
     // body...
     var response = HelperServerPetition.sendBasic(
                    {
                         url:  baseUrl()+'/generator/createdir',
                        type:  'GET',
                        data:  'id='+project                                  
                    }
                );
        response.done(function(data){                    
            // agrega el componente que retorna la peticion 
            // al elemento que se pasa como parametro

           $(".progres_create").append(data.result);
            copyBaseModule(project,nametable); 

        }) 
   }



   function copyBaseModule(project,nametable){

       var response = HelperServerPetition.sendBasic(
                    {
                         url:  baseUrl()+'/generator/copybasemodule',
                        type:  'GET',
                        data:  'id='+project+"&name="+nametable                                  
                    }
                );
        response.done(function(data){                    
            // agrega el componente que retorna la peticion 
            // al elemento que se pasa como parametro

           $(".progres_create").append(data.result);
            createRepository(project,nametable);
 
        })  
   }



   function createRepository(project,nametable){

       var response = HelperServerPetition.sendBasic(
                    {
                         url:  baseUrl()+'/generator/createrepository',
                        type:  'GET',
                        data:  'id='+project+"&name="+nametable                                  
                    }
                );
        response.done(function(data){                    
            // agrega el componente que retorna la peticion 
            // al elemento que se pasa como parametro
       
           $(".progres_create").append(data.result);
           createprovider(project,nametable)
           

        })  
   }




   function createprovider(project,nametable){

       var response = HelperServerPetition.sendBasic(
                    {
                         url:  baseUrl()+'/generator/createprovider',
                        type:  'GET',
                        data:  'id='+project+"&name="+nametable                                  
                    }
                );
        response.done(function(data){                    
            // agrega el componente que retorna la peticion 
            // al elemento que se pasa como parametro

           $(".progres_create").append(data.result);
           createrequest(project,nametable);

        })  
   }



   function createrequest(project,nametable){

       var response = HelperServerPetition.sendBasic(
                    {
                         url:  baseUrl()+'/generator/createrequest',
                        type:  'GET',
                        data:  'id='+project+"&name="+nametable                                  
                    }
                );
        response.done(function(data){                    
            // agrega el componente que retorna la peticion 
            // al elemento que se pasa como parametro

           $(".progres_create").append(data.result);
           createroutes(project,nametable)

        })  
   }


   function createroutes(project,nametable){

       var response = HelperServerPetition.sendBasic(
                    {
                         url:  baseUrl()+'/generator/createroutes',
                        type:  'GET',
                        data:  'id='+project+"&name="+nametable                                  
                    }
                );
        response.done(function(data){                    
            // agrega el componente que retorna la peticion 
            // al elemento que se pasa como parametro

           $(".progres_create").append(data.result);
           createcontoller(project,nametable)
           

        })  
   }



   function createcontoller(project,nametable){

       var response = HelperServerPetition.sendBasic(
                    {
                         url:  baseUrl()+'/generator/createcontoller',
                        type:  'GET',
                        data:  'id='+project+"&name="+nametable                                  
                    }
                );
        response.done(function(data){                    
            // agrega el componente que retorna la peticion 
            // al elemento que se pasa como parametro

           $(".progres_create").append(data.result);
           createmodel(project,nametable)
           

        })  
   }



    function createmodel(project,nametable){

       var response = HelperServerPetition.sendBasic(
                    {
                         url:  baseUrl()+'/generator/createmodel',
                        type:  'GET',
                        data:  'id='+project+"&name="+nametable                                  
                    }
                );
        response.done(function(data){                    
            // agrega el componente que retorna la peticion 
            // al elemento que se pasa como parametro

           $(".progres_create").append(data.result);
           createconfig(project,nametable)
           

        })  
   }




    function createconfig(project,nametable){

       var response = HelperServerPetition.sendBasic(
                    {
                         url:  baseUrl()+'/generator/createconfig',
                        type:  'GET',
                        data:  'id='+project+"&name="+nametable                                  
                    }
                );
        response.done(function(data){                    
            // agrega el componente que retorna la peticion 
            // al elemento que se pasa como parametro

           $(".progres_create").append(data.result);
           createjs(project,nametable)

        })  
   }



       function createjs(project,nametable){

       var response = HelperServerPetition.sendBasic(
                    {
                         url:  baseUrl()+'/generator/createjs',
                        type:  'GET',
                        data:  'id='+project+"&name="+nametable                                  
                    }
                );
        response.done(function(data){                    
            // agrega el componente que retorna la peticion 
            // al elemento que se pasa como parametro

           $(".progres_create").append(data.result);
           createview(project,nametable)
           

        })  
   }



          function createview(project,nametable){

       var response = HelperServerPetition.sendBasic(
                    {
                         url:  baseUrl()+'/generator/createview',
                        type:  'GET',
                        data:  'id='+project+"&name="+nametable                                  
                    }
                );
        response.done(function(data){                    
            // agrega el componente que retorna la peticion 
            // al elemento que se pasa como parametro

           $(".progres_create").append(data.result);
           

        })  
   }


