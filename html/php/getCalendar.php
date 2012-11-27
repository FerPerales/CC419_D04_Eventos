<?php
	
		//Conectarse a la base de datos
	require_once("bd.inc");
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Validar que no genere error la conexión
	if($con -> connect_error)
		die("Por el momento no se puede acceder al gestor de la base de datos");


	//Creo la consulta
	$mi_query = "SELECT idevento, nombre, fechaEvento
				 FROM evento";
	
	//Ejecuto mi consulta
	$result = $con -> query($mi_query);
	
	//Cierro la conexión
	$con -> close();

	//Convierto el resultado de mi consulta a una matriz
	$cuantosRenglones = $result -> num_rows;
	
	//Creo el arreglo de arreglos donde guardaré los datos de mi evento
	$eventos = array();
	
	if($cuantosRenglones >= 1){
		
		//Por cada fila obtengo un arreglo		
		while($fila = $result -> fetch_assoc())
		
			//Agrego los nuevos objetos que creo con la información de la base de datos	
			array_push($eventos, array(
				'start' => strtotime($fila['fechaEvento']), 
				'end' => strtotime($fila['fechaEvento']),
				'title' => $fila['nombre'],
				'url' => "vistaDetalle.php?evento=".$fila['idevento'],
				'allDay' => true				
			));
			
	}
	//Imprimo el arreglo en formato JSON
	echo json_encode($eventos);
	
?>