<?php
	//Porque la maestra dijo
	//session_start();

	//Conectarse a la base de datos
	require_once("bd.inc");
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Validar que no genere error la conexión
	if($con -> connect_error)
		die("Por el momento no se puede acceder al gestor de la base de datos");


	//Creo la consulta
	$mi_query = "SELECT *
				 FROM evento where status = 'aprobado'
				 ORDER BY fechaCreacion DESC";
	//fechaEvento, nombre, rutaFlyer, descripcion, capacidad, categoria
	
	//Ejecuto mi consulta
	$result = $con -> query($mi_query);

	//echo '<pre>';
	//var_dump($result);
	//echo '</pre>';
	
	//Cierro la conexión
	$con -> close();
	
	//Convierto el resultado de mi consulta a una matriz
	$datos = NULL;	
	$cuantosRenglones = $result -> num_rows;
	if($cuantosRenglones >= 1){
		//Por cada fila obtengo un arreglo
		while($fila = $result -> fetch_assoc())
			$datos[] = $fila;
	}
	
	
	//Porque la maestra dijo
	//$_SESSION["datos"] = $datos;

	//Me voy a la página del formulario que falta completar
	//header("Location: ../usuarios.php");
	//echo '<pre>';
	//var_dump($datos);
	//echo '</pre>';
?>