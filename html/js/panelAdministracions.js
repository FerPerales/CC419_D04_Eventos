window.onload = function(){
	
	var items = document.getElementsByClassName('comentario');
	
	document.getElementById("todos").onclick = function(){
		for(i in items){
			items[i].checked = 1;							
		}
	};

	document.getElementById("ninguno").onclick = function(){
		for(i in items){
			items[i].checked = 0;				
		}
	};
	
	document.getElementById("check1").onclick = function(){
		document.getElementById("operacion").value='check';
		document.getElementById("enviar").click();				
	};	
	document.getElementById("check2").onclick = function(){
		document.getElementById("operacion").value='check';	
		document.getElementById("enviar").click();			
	};	
	document.getElementById("cross1").onclick = function(){
		document.getElementById("operacion").value='cross';	
		document.getElementById("enviar").click();			
	};	
	document.getElementById("cross2").onclick = function(){
		document.getElementById("operacion").value='cross';	
		document.getElementById("enviar").click();			
	};	
	document.getElementById("pending1").onclick = function(){
		document.getElementById("operacion").value='pending';	
		document.getElementById("enviar").click();			
	};	
	document.getElementById("pending2").onclick = function(){
		document.getElementById("operacion").value='pending';	
		document.getElementById("enviar").click();			
	};	
	
};

