window.onload = function(){
	
	var items = document.getElementsByClassName('comentario');
	

	document.getElementById("todos").onclick = function(){
		for(i in items){
			var itemActual = items[i];							
			itemActual.checked = 1;					
		}
	};

	document.getElementById("ninguno").onclick = function(){
		for(i in items){
			var itemActual = items[i];							
			itemActual.checked = 0;					
		}
	};
	
};
