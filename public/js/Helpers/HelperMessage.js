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



    showNoty: function(message,type){

    	var n = noty({
        text: message,
        type: type,
        animation: {
               open: {height: 'toggle'}, // jQuery animate function property object
               close: {height: 'toggle'}, // jQuery animate function property object
               easing: 'swing', // easing
               speed: 500 // opening & closing animation speed
            }
        });        

    },
    

	showAlertForm: function(responseData){
        var type = responseData.type;
        var message = responseData.message;
        var id = responseData.field;
        // contenedor del error
        $("."+id+" ."+HelperMessage.classSpanError+" ul").append("<li>"+message+"</li>");

        

	},





}