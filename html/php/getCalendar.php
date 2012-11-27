<?php
	
	$evento[] = array(
		'start' => 1354302000, #30 de noviembre del 2012 a las 7:00 pm
		'end' => 1354312800, #30 de noviembre del 2012 a las 10:00 pm
		'title' => "Evento de prueba",
		'url' => "http://hackergarage.mx"				
	);
	
	
	echo json_encode($evento);
	
?>