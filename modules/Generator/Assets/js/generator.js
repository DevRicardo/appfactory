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
/*eventCreate ();*/

//createField();




/****************************************
*                                       *  
*            VIEW INDEX                 *
*                                       *
*****************************************/
/*loadData({
	route:   'generator',
	nextpage:'1',
	callback:eventDelete
});*






/****************************************
*                                       *  
*            VIEW EDIT                  *
*                                       *
*****************************************/
// evento para actualizar projecto
//eventUpdate();



}


// Evento que ejecuta la fincion principal
$(document).on('ready', main);