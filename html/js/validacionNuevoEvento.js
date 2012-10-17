document.onload = function(){
	$(function() {
			$("#date_event").datepicker({  minDate: -1 });
	});

	
	document.reg_event.enviar.onclick = validar;
	
	function validar(){
		/* Constantes */
		var VALOR_CAMPO_NOMBRE = 8;
		var VALOR_CAMPO_DESCRIPCION = 20;
		
		/* Variables */
		var form = document.reg_event;
		var correcto = true;
		
		/*Validacion del nombre*/
		var valorCampo = form.nom_event.value;
		if (valorCampo.length < VALOR_CAMPO_NOMBRE){
			correcto = false;
		}else{
			console.log("Todo bien :3");
		}	
		
		/*Validacion de la imagen*/
		valorCampo = form.img_event.value;
		if(valorCampo == ""){
			correcto = false;
		}else{
			console.log("Imagen todo bien ;D");
		}
		
		/*Validacion de la descripcion*/
		valorCampo = form.textarea.value;
		if (valorCampo.length < VALOR_CAMPO_DESCRIPCION){
			correcto = false;
		}else{
			console.log("Descripcion bien ;)")
		}
		
		/*Validacion del precio*/
		valorCampo = form.cost_event.value;
		if(valorCampo < 0){
			correcto = false;
		}else{
			console.log("Precio chingón ;D");
		}		
	}
	
	function verificarRadioButtons(){
		if(document.reg_event.radioLimitado.checked){
			document.reg_event.cap_event.disabled = 0;
		}else{
			document.reg_event.cap_event.disabled = 1;
		}
	}	
	
	document.reg_event.radioLimitado.onclick = verificarRadioButtons;
	document.reg_event.radioIlimitado.onclick = verificarRadioButtons;
	
}();