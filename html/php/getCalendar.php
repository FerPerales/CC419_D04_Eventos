<?php
	
	//Conectarse a la base de datos
	require_once("bd.inc");
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Validar que no genere error la conexión
	if($con -> connect_error)
		die("Por el momento no se puede acceder al gestor de la base de datos");

	$mi_query = "SELECT evento.idevento, evento.nombre, evento.fechaEvento, categoria.color
				FROM evento LEFT JOIN categoria 
				ON evento.categoria=categoria.idcategoria 
				WHERE status LIKE 'aprobado'"; 

	$result = $con -> query($mi_query);

	$cuantosRenglones = $result -> num_rows;

	$eventos = array();
	
	if($cuantosRenglones >= 1){
		
		while($fila = $result -> fetch_assoc())
	
			array_push($eventos, array(
				'start' => strtotime($fila['fechaEvento']), 
				'end' => strtotime($fila['fechaEvento']),
				'title' => $fila['nombre'],
				'url' => "vistaDetalle.php?evento=".$fila['idevento'],
				'allDay' => true,	
				'color' => $fila['color']
			));
			
	}

	$con -> close();
	echo json_encode($eventos);
	
?>