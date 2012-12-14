<?php
function misEventos () {
	//Conexion a la base de datos
	include("bd.inc");
	
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Validar que no genere error la conexión
	if($con -> connect_error)
		header("Location: ".$_SERVER["REQUEST_URI"]."?error=11");
	
	//Extraer qué usuario está pidiendo la consulta:
	$usuario = $_SESSION["access_token"]["user_id"];

	//Creo la consulta
	$mi_query = "select evento.idevento, evento.nombre, evento.descripcion, evento.precio, evento.capacidad, 
					evento.fechaEvento, categoria.categoria, evento.status, evento.motivo from evento left join categoria
					on evento.categoria=categoria.idcategoria where creadoPor=$usuario";
	
	//Ejecutar mi consulta
	$result = $con -> query($mi_query);

	//echo '<pre>';
	//var_dump($result);
	//echo '</pre>';
	
	//Cierro la conexión
	$con -> close();

	//Convierto el resultado de mi consulta a una matriz
	//var_dump($result);
	if ( $result != false) // cuando la consulta sí dio algo
	{
		$cuantosRenglones = $result -> num_rows;
		if($cuantosRenglones >= 1)
		{
			//Por cada fila obtengo un arreglo
			while($fila = $result -> fetch_assoc())
				$datos[] = $fila;
		}	
	}
	if (isset($datos))
		return $datos;
}

function eliminarEvento($id) {
	include("bd.inc");
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	if($mysqli -> connect_error)
		header("Location: ".$_SERVER["REQUEST_URI"]."?error=11");
			
	$consult = $mysqli -> query("select rutaFlyer from evento where idevento=$id");
	$consult = $consult -> fetch_assoc();
	unlink($consult["rutaFlyer"]);
	//Consulta
	$consult_ = "delete from evento where idevento=$id";
	//Ejecutar consulta
	$mysqli -> query($consult_);
	//Cerrar consulta
	$mysqli -> close();	
}

function consultaCategorias() {
	include("bd.inc");
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	if($mysqli -> connect_error)
		header("Location: ".$_SERVER["REQUEST_URI"]."?error=11");
		
	//Creo la consulta
	$mi_query = "select * from categoria";
	
	//Ejecutar mi consulta
	$result = $mysqli -> query($mi_query);
	
	//Cierro la conexión
	$mysqli -> close();

	//Convierto el resultado de mi consulta a una matriz
	$cuantosRenglones = $result -> num_rows;
	if($cuantosRenglones >= 1){
		//Por cada fila obtengo un arreglo
		while($fila = $result -> fetch_assoc())
			$datos[] = $fila;
	}	
	
	return $datos;
}

function modificarEvento($id) {
	include("bd.inc");
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	if($mysqli -> connect_error)
		header("Location: ".$_SERVER["REQUEST_URI"]."?error=11");
		
	//Creo la consulta
	$mi_query = "select nombre,rutaFlyer,descripcion,precio,capacidad,fechaEvento,categoria from evento where idevento=$id";
	
	//Ejecutar mi consulta
	$result = $mysqli -> query($mi_query);
	
	//Cierro la conexión
	$mysqli -> close();
	
	//Convierto el resultado de mi consulta a una matriz
	$cuantosRenglones = $result -> num_rows;
	if($cuantosRenglones == 1) {
		$fila = $result -> fetch_assoc();
	}	
	
	return $fila;	
}

function search($string, $status, $usuario) {
	include("bd.inc");
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	if($mysqli -> connect_error)
		header("Location: ".$_SERVER["REQUEST_URI"]."?error=11");
		
	$string = $mysqli -> real_escape_string($string);
	$string = htmlentities($string, ENT_QUOTES,'UTF-8');
	if(!empty($string) && empty($status) && empty($usuario)) {
		$mi_query = "select evento.idevento, evento.nombre, usuario.username creadoPor, evento.status, evento.motivo from evento 
					inner join usuario on evento.creadoPor = usuario.twitter where idevento like '%$string%'
					OR nombre like '%$string%' OR creadoPor like '%$string%' OR status like '%$string%'
					OR motivo like '%$string%'";
	} elseif(!empty($status) && empty($string) && empty($usuario)) {
		$mi_query = "select evento.idevento, evento.nombre, usuario.username creadoPor, evento.status, evento.motivo from evento 
					inner join usuario on evento.creadoPor=usuario.twitter where status='$status'";
	} elseif(empty($string) && empty($status) && !empty($usuario)) {
		$mi_query = "SELECT evento.idevento, evento.nombre, usuario.username creadoPor, evento.status, evento.motivo
						FROM evento INNER JOIN usuario ON evento.creadoPor = usuario.twitter WHERE evento.creadoPor ='$usuario'";
	} else 
		$mi_query = "select evento.idevento, evento.nombre, usuario.username creadoPor, evento.status, evento.motivo from evento
					inner join usuario on evento.creadoPor = usuario.twitter where idevento like '%$string%'
					OR nombre like '%$string%' OR creadoPor like '%$string%' OR status like '%$string%'
					OR motivo like '%$string%' OR status='$status' OR evento.creadoPor='$usuario'";
			
	
	//Ejecutar mi consulta
	$result = $mysqli -> query($mi_query);
	
	//Cierro la conexión
	$mysqli -> close();

	//Convierto el resultado de mi consulta a una matriz
	if ( $result != false) // cuando la consulta sí dio algo
	{
		$cuantosRenglones = $result -> num_rows;
		if($cuantosRenglones >= 1)
		{
			//Por cada fila obtengo un arreglo
			while($fila = $result -> fetch_assoc())
				$datos[] = $fila;
		}	
	}
	return $datos;
}

function usuarios() {
	//Conexion a la base de datos
	include("bd.inc");
	
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Validar que no genere error la conexión
	if($mysqli -> connect_error)
		header("Location: ".$_SERVER["REQUEST_URI"]."?error=11");
	
	$query = "select twitter, username from usuario";
	
	$result = $mysqli -> query($query);
	
	$mysqli -> close();
	
	if ( $result != false) // cuando la consulta sí dio algo
	{
		$cuantosRenglones = $result -> num_rows;
		if($cuantosRenglones >= 1)
		{
			//Por cada fila obtengo un arreglo
			while($fila = $result -> fetch_assoc())
				$datos[] = $fila;
		}	
	}
	return $datos;
}
	
?>