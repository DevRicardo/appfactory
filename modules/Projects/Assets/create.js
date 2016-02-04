
// evento para el boton con class crear |  |
function eventCreate () {
	// Formulario en la vista create con la class="create"
	$(".create").on('submit', function(event) {
		// body...
		// evitando el comportamiento por defecto del boton type submit
		event.preventDefault();

		var objElement = this;
		HelperServerPetition.send(objElement);
	});
}