/*
* @Autor: Jose Alejandro Ricardo 
* @Version: 0.1.0
* @Creation: 2016-09-04
* @Updated: 2016-09-04
* @Description 
* Ayudante para generar alertas y notificaciones en la vista
* NOTA:
* Las alertas y notificaciones dependen de la libreria noty.js
*/

var HelperMessage = {

	defaultDisplayMessge: 'dashboard-messge',
	spanMessage: "<span class='helper-error'><ul></ul></span>",
	classSpanError: "helper-error",

	typeMessage: ['success', 'warning', 'error', 'information', 'alert'],



    showNoty: function(message,type,callback){

      var config = {

        text: message,
        type: type,
        animation: {
               open: {height: 'toggle'}, // jQuery animate function property object
               close: {height: 'toggle'}, // jQuery animate function property object
               easing: 'swing', // easing
               speed: 500// opening & closing animation speed
               
            },
        dismissQueue: true,
        timeout:3000 

      }

      if(type == "confirm"){
          config.buttons = [
                {addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {
                    $noty.close();
                     callback();                   
                    
                  }
                },
                {addClass: 'btn btn-danger', text: 'Cancel', onClick: function($noty) {
                    $noty.close();
                    HelperMessage.showNoty('Canceled','error');
                  }
                }
          ]
      }
     

    	var n = noty(config);        

    },
    

	showAlertForm: function(responseData){
      var type = responseData.type;
      var message = responseData.message;
      var id = responseData.field;
      // contenedor del error
      $("."+id+" ."+HelperMessage.classSpanError+" ul").append("<li>"+message+"</li>");
    
        

	},


  displayNotyOn: function(responseData){
      var type = responseData.type;      
      var id = responseData.field;
      var messages = HelperMessage.listMessage( responseData.msg );  
      HelperMessage.showNoty(messages,type);
  },

  listMessage: function(objMensajes){
       var result = "";
       for(var i = 0; i < objMensajes.length; i++)
       {           
          result += ""+objMensajes[i]+"<br>";
       }
       return result;
  },


  showConfirm: function(){
      HelperMessage.showNoty("Esta suguro de eliminar el project","confirm",function(){
        HelperMessage.showNoty('Succesfull','success');
      });  
  }





}