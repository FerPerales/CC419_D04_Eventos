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
	
};
