/*
* @Autor: Jose Alejandro Ricardo 
* @Version: 0.1.0
* @Creation: 2016-02-04
* @Updated: 2016-02-04
* @Description 
* Este archivo se de nomina principal, aqui se van a ejecutar todos los
* eventos y funciones javascript que se necesiten para la vista.
* 
*/





// Funcion prncipal
function main () {


/****************************************
*                                       *  
*               DEFAULT                 *
*                                       *
*****************************************/



/****************************************
*                                       *  
*            VIEW CREATE                *
*                                       *
*****************************************/
// evento para el boton con class crear
eventCreate ();




/****************************************
*                                       *  
*            VIEW INDEX                 *
*                                       *
*****************************************/
loadData({
	route:   'crops',
	nextpage:'1',
	callback:eventDelete
});






/****************************************
*                                       *  
*            VIEW EDIT                  *
*                                       *
*****************************************/
// evento para mostrar imagen completa del formulario editar
showAndHideImage();

// evento para actualizar projecto
eventUpdate();



}


// Evento que ejecuta la fincion principal
$(document).on('ready', main);
