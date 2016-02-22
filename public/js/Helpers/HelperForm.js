/*
* @Autor: Jose Alejandro Ricardo 
* @Version: 0.1.0
* @Creation: 2016-02-22
* @Updated: 2016-02-22
* @Description 
* Ayudante para el manejo de formularios y de sus componentes
*/

var HelperForm = {

     /*
    * Restablece todos los campos del formulario 
    */
	clean: function(objForm){

		objForm.find(':input').each(function() {
            switch(this.type) {
                case 'password':
                case 'select-multiple':
                case 'select-one':
                case 'text':
                case 'textarea':
                    $(this).val('');
                    break;
                case 'checkbox':
                case 'radio':
                    this.checked = false;
            }
        });

	}
}