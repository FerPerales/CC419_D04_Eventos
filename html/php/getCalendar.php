<?php
	
	/*$evento[] = array(
		'start' => 1354302000, #30 de noviembre del 2012 a las 7:00 pm
		'end' => 1354312800, #30 de noviembre del 2012 a las 10:00 pm
		'title' => "Evento de prueba",
		'url' => "http://hackergarage.mx",
		'allDay' => true				
	);*/
	
		//Conectarse a la base de datos
	require_once("bd.inc");
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Validar que no genere error la conexión
	if($con -> connect_error)
		die("Por el momento no se puede acceder al gestor de la base de datos");


	//Creo la consulta
	$mi_query = "SELECT idevento, nombre, fechaEvento
				 FROM evento";
	//fechaEvento, nombre, rutaFlyer, descripcion, capacidad, categoria
	
	//Ejecuto mi consulta
	$result = $con -> query($mi_query);

	//echo '<pre>';
	//var_dump($result);
	//echo '</pre>';
	
	//Cierro la conexión
	$con -> close();

	//Convierto el resultado de mi consulta a una matriz
	$cuantosRenglones = $result -> num_rows;
	$eventos = array();
	
	if($cuantosRenglones >= 1){
		//Por cada fila obtengo un arreglo
		
		while($fila = $result -> fetch_assoc())
			/*echo "Entro<br/> con". $fila['idevento'];*/
			
			array_push($eventos, array(
				'start' => strtotime($fila['fechaEvento']), #30 de noviembre del 2012 a las 7:00 pm
				'end' => strtotime($fila['fechaEvento']), #30 de noviembre del 2012 a las 10:00 pm
				'title' => $fila['nombre'],
				'url' => "vistaDetalle.php?evento=".$fila['idevento'],
				'allDay' => true				
			));
			
	}
		
	echo json_encode($eventos);
	
?>