/*
* @Autor: Jose Alejandro Ricardo 
* @Version: 0.1.0
* @Creation: 2016-08-04
* @Updated: 2016-08-04
* @Description 
* Ayudante para la validacion de formularios
* NOTA:
* Las validaciones se realizan utilizando la 
* micro libreria is.js.
*/

var HelperValidation = {

    // clases para aplicar la validacion
	rules:{
		'number'      :'Solo se permite ingresar numeros',
		'json'         :'',
		'string'       :'',
		'char'         :'',
		'undefined'    :'',
		'empty'        :'',
		'space'        :'',
		'url'          :'No es una url valida',
		'email'        :'No es un email valido',
		'alphaNumeric' :'Solo se permiten caracteres alpha-numericos',
		'timeString'   :'',
		'dateString'   :'',
		'equal'        :'',
		'positive'     :'',
		'negative'     :'',
		'decimal'      :'',
		'integer'      :'Solo se permiten numeros enteros',
		'safePassword' :'La contraseña no es segura',
		'firstLastName':'',
		'userName'     :'',
		'titulo'       :'Caracteres no permitidos',
		'imagenFile'   :'La imagen posee un formato no soportado',
		'required'     :'El campo es requerido'



	},

	error:[],


	/*
    ------------------------safePassword---------------------------------------
    exprecion  (?=^.{8,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$ 
    Contraseñas que contengan al menos una letra mayúscula.
    Contraseñas que contengan al menos una letra minúscula.
    Contraseñas que contengan al menos un número o caracter especial.
    Contraseñas cuya longitud sea como mínimo 8 caracteres.
    Contraseñas cuya longitud máxima no debe ser arbitrariamente limitada.



    ------------------------ firstLastName---------------------------------------
    expercion  ^[A-Za-záéíóúñ]{2,}([\s][A-Za-záéíóúñ]{2,})+$



    ----------------------- userName ---------------------------------------------
    exprecion  ^[ A-Za-z0-9_-záéíóúñ]{3,15}$
    acepta minimo 3 y maximo 15 caracteres
    acepta, letras, numeros, underscore y espacios

	*/

    /*---------------------------------------------------------------------
    * Recorre los campos del formulario y ejecuta las reglas de validacion
    * que estan determinadas por el atributo data-validate que se encuentra 
    * en cada campo.
    *----------------------------------------------------------------------
    * @param objeto de tipo formulario
    * @return true si la validacion es exitosa o un array con los errores y 
    *         el id del campo que le corresponde. 
    */
	execute: function(objForm){
      
        var index = 0;
		$(objForm).find(':input').each(function() {
            var elemento= this;
            var id = $(elemento).attr('id');
            var type = $(elemento).attr('type');
            var classValidate = $(elemento).data('validate');
            //alert("elemento.name=" + elemento.name);
            
            if(typeof(classValidate) != 'undefined' && classValidate != ''){
                //alert(classValidate+" ----");
                var arrayClass = classValidate.split(' ');

                for (var i = 0; i < arrayClass.length; i++) {
                    HelperValidation.error[index] = HelperValidation.applyValidator(arrayClass[i],elemento);
                    index++;
                }
                
                
            }     

            
        });

        

	},



    // aplica la regla de validacion pasada por aparametro al value
    // que tambien se le pasa por parametro
    // @return {'campo':'id del campo', 'error':'true o false'}
	applyValidator: function(rule, objInput){

        var objetoValidado = {};
        var error = null;
        var id_imput = $(objInput).attr('id');
        // se valida que la funcion exista 
		if($.isFunction( window["HelperValidation"][rule] )){

			//ejecutamos la validacion
			error = window["HelperValidation"][rule](objInput);

		}else{
			alert("No se encontro la funcion definida para la validacion (helperValidation:L112)");
		}
        // objeto con las caracteristicas del resultado de la validacion
        objetoValidado.rule = rule;
        objetoValidado.message = HelperValidation.rules[rule];
		objetoValidado.field = id_imput;
		objetoValidado.error = error; 

		return objetoValidado;       

	},





	/**********************************************************
	*                                                         *
	*                 FUNCIONES PARA VALIDACION               *
	*                                                         *
	***********************************************************/

	imagenFile: function(objInput){
        
        var filePermitted = ['jpg','png','jpeg']; 
		var value = $(objInput).val();
        var file = value.toLowerCase();
        var extension = file.substring(file.lastIndexOf('.') + 1);
        // si la extencion se encuentra en el array de permitidos la 
        // validacion es correcta.
        if($.inArray(extension, filePermitted) > -1){
            return false;
        }else{
        	return true;
        }

	},

	safePassword: function(objInput){

        var value = $(objInput).val().trim();
        var expercion = /(?=^.{8,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;        
        return !value.match(expercion);

	},

	text: function(objInput){

        var value = $(objInput).val().trim();
        var expercion = /^[ A-Za-z0-9_-záéíóúñ*;,.\'\"?()=$!|%#¡¿&-]{1,250}$/;
        return !is.regexp(expercion);

	},


	required: function(objInput){

        var value = $(objInput).val().trim();
        return is.empty(value);

	},

	number: function(objInput){
        var value = $(objInput).val().trim();
        return !is.number(value);
	},

	url: function(objInput){
        var value = $(objInput).val().trim();
        return !is.url(value);
	},

	email: function(objInput){
        var value = $(objInput).val().trim();
        return !is.email(value);
	},

	alphaNumeric: function(objInput){
        var value = $(objInput).val().trim();
        return !is.alphaNumeric(value);
	},

	integer: function(objInput){
        var value = $(objInput).val().trim();
        return !is.integer(value);
	},






}

