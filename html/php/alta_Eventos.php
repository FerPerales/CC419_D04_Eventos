<?php
	var_dump($_FILES);
	require_once("bd.inc");
	$mysql = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Obtener variables
	$nomEvento = $_REQUEST["nom_event"];
	$descripcion = $_REQUEST["descripcion"];
	$precio = $_REQUEST["cost_event"];
	$capacidad = $_REQUEST["cap"];
	if($capacidad == "limited") {
		$num_cap = $_REQUEST["cap_event"];
	} else {
		if($capacidad == "ilimited")
			$num_cap = -1;	
	}	
	$categoria = $_REQUEST["cat"];
	$fecha = $_REQUEST["dat_event"];
	$fechaActual = date("Y-m-d");
	
	$tempdate = explode("/", $fecha);
	$fecha = $tempdate[2] . '-' . $tempdate[0] . '-' . $tempdate [1];
	unset($tempdate);
	
	//Realizar validaciones con todas las formas de limpiar variables
	$nomEvento = $mysql -> real_escape_string($nomEvento);
	$descripcion = $mysql -> real_escape_string($descripcion);
	$precio = $mysql -> real_escape_string($precio);
	$capacidad = $mysql -> real_escape_string($capacidad);
	$num_cap = $mysql -> real_escape_string($num_cap);
	$categoria = $mysql -> real_escape_string($categoria);
	$fecha = $mysql -> real_escape_string($fecha);
	
	$nomEvento = htmlentities($nomEvento);
	$descripcion = htmlentities($descripcion);
	$precio = htmlentities($precio);
	$capacidad = htmlentities($capacidad);
	$num_cap = htmlentities($num_cap);
	$categoria = htmlentities($categoria);
	$fecha = htmlentities($fecha);
	
	if(preg_match('/[A-Za-z0-9 _\-\#\@\.\,\:]{8,}/', $nomEvento) == 0) {
		die("El nombre del evento cuenta con caracteres invalidos");
	}
	if(preg_match('/[A-Za-z0-9 _\-\#\@\.\,\:\&]{20,45}/', $descripcion) == 0){
		die("La descripcion cuenta con caracteres invalidos");	
	}
	if(preg_match('/[0-9]+/', $precio) == 0) {
		die("El precio es incorrecto");	
	}
	if(preg_match('/-*[0-9]+/',$num_cap) == 0) {
		die("La capacidad es erronea");	
	}
	if(preg_match('/[0-9]/', $categoria) == 0) {
		die("La categoria es erronea");	
	}
	if(preg_match('/(20[0-9]{2})-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])/', $fecha) == 0) {
		die("Fecha invalida");	
	}
	//Ingresamos los datos del evento a la base de datos
	$query = "INSERT INTO evento(creadoPor, nombre,descripcion,precio,capacidad,fechaEvento,fechaCreacion,status,categoria) 
					VALUES (1,'$nomEvento','$descripcion',$precio,$num_cap,'$fecha','$fechaActual','PENDIENTE',$categoria)";

	if(!$mysql -> query($query)) {
		die("Error al ingresar los datos. Vuelva a intentar");	
	}
	
	//header("Location: ../index.html");
?>