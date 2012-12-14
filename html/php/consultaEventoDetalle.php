
<?php

	//Conectarse a la base de datos
	require_once("bd.inc");
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Validar que no genere error la conexión
	if($con -> connect_error)
		header("Location: ".$_SERVER["REQUEST_URI"]."?error=11");


	//Creo la consulta
	if (isset($evento))
		$mi_query = "select evento.idevento, evento.fechaEvento, evento.nombre, evento.rutaFlyer, evento.descripcion, 
						evento.capacidad, categoria.categoria, evento.creadoPor, evento.precio from evento left join categoria ON 
						evento.categoria=categoria.idcategoria where idevento = ".$evento;
	else header("Location: 404.php");
	//var_dump($mi_query);			 
	//fechaEvento, nombre, rutaFlyer, descripcion, capacidad, categoria
	
	//Ejecuto mi consulta
	$result = $con -> query($mi_query);
	
	//Cierro la conexión
	$con -> close();

	//poner los resultados del query en un arreglo
	if (isset($result))
		$fila = $result -> fetch_assoc();
	else header("Location: 404.php");
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