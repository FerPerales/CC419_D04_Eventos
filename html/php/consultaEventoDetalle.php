<?php

	//Conectarse a la base de datos
	require_once("bd.inc");
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Validar que no genere error la conexión
	if($con -> connect_error)
		die("Por el momento no se puede acceder al gestor de la base de datos");


	//Creo la consulta
	$mi_query = "select idevento, fechaEvento, nombre, rutaFlyer, descripcion, capacidad, categoria, creadoPor
				 from evento where idevento = ".$evento;
	//fechaEvento, nombre, rutaFlyer, descripcion, capacidad, categoria
	
	//Ejecuto mi consulta
	$result = $con -> query($mi_query);
	
	//Cierro la conexión
	$con -> close();

	//poner los resultados del query en un arreglo
	$fila = $result -> fetch_assoc();
	/*
	var_dump($fila);
	echo '<pre>';
	var_dump($fila);
	echo '</pre>';
*/	
	
	//Porque la maestra dijo
	//$_SESSION["datos"] = $datos;

	//Me voy a la página del formulario que falta completar
	//header("Location: ../usuarios.php");
	//echo '<pre>';
	//var_dump($datos);
	//echo '</pre>';
?>