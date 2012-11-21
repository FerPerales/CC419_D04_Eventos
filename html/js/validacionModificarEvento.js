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
			alert('El campo de nombre debe ser de al menos' + VALOR_CAMPO_NOMBRE + " caracteres");			
			correcto = false;
		}else{
		}	
		
		/*Validacion de la descripcion*/
		valorCampo = form.textarea.value;
		if (valorCampo.length < VALOR_CAMPO_DESCRIPCION && correcto){
			alert('La descripción debe de tener al menos ' + VALOR_CAMPO_DESCRIPCION + ' caracteres');
			correcto = false;
		}else{
		}
		
		/*Validacion del precio*/
		valorCampo = form.cost_event.value;
		if(valorCampo < 0 && correcto){
			alert("El precio debes ser mayor o igual a $0.00");
			correcto = false;
		}else{
		}		
		
		/*Validacion capacidad*/
		if(document.reg_event.radioLimitado.checked && correcto){
			valorCampo = document.reg_event.cap_event.value;
			if(valorCampo < 0){
				alert("No puedes hacer un evento con menos de 1 asistente");
				correcto = false;
			}else{
				
			}
		}
		
		/*^Validacion categoria*/
		valorCampo = form.cat.value;
		console.log("Valor es" + valorCampo);
		if(valorCampo == 0 && correcto){
			alert("Debes seleccionar una categoría para tu evento");
			correcto = false;
		}else{
			
		}
		
		/*Validacion fecha (formato MM/DD/YYYY)*/
		valorCampo = form.dat_event.value;
		var fecha = /^(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d$/;
		if(!fecha.test(valorCampo) && correcto){
			alert("Selecciona una fecha válida con el calendario");
			correcto = false;
		}else{
			
		}
		
		
		if(correcto){
			form.submit;
			console.log("Enviando :D");
		}else{
			console.log("Hay errores");
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
