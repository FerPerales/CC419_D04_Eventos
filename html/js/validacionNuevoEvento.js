document.onload = function(){
	$(function() {
			$("#date_event").datepicker({  minDate: -1 });
	});

	
	document.reg_event.enviar.onclick = validar;
	
	function validar(){
		/* Constantes */
		var VALOR_CAMPO_NOMBRE = 8;
		
		/* Variables */
		var form = document.reg_event;
		var correcto = true;
		
		/*Validacion del nombre*/
		var valorCampo = form.nom_event.value;
		if (valorCampo.length < VALOR_CAMPO_NOMBRE){
			console.log("invalido");
		}else{
			console.log("Todo bien :3");
		}	
	}
	
	
}();
