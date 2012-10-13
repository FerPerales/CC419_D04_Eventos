window.onload = function(){
	
	var items = document.getElementsByClassName('comentario');
	
	function activarCheckbuttons(valor){
		for(i in items){
			var itemActual = items[i];	
			console.log(itemActual);							
			itemActual.checked = valor;					
		}
	};

	
	document.getElementById("todos").onclick = function(){
		for(i in items){
			var itemActual = items[i];	
			console.log(itemActual);							
			itemActual.checked = 1;					
		}
	};


	
	
	document.getElementById("ninguno").onclick = function(){
		for(i in items){
			var itemActual = items[i];	
			console.log(itemActual);							
			itemActual.checked = 0;					
		}
	};
	
};
