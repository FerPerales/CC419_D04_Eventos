<?php
		//Conectarse a la base de datos
	require_once("bd.inc");
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Validar que no genere error la conexión
	if($con -> connect_error)
		header("Location: panelAdministracion.php?error=11");

	//Creo la consulta
	$mi_query = "SELECT evento.idevento, evento.nombre, usuario.username creadoPor, evento.status, evento.motivo, evento.descripcion, 
				evento.precio, evento.capacidad, evento.categoria FROM evento INNER JOIN usuario ON evento.creadoPor = usuario.twitter";
	
	//Ejecutar mi consulta
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
	/*
	echo '<pre>';
	var_dump($datos);
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