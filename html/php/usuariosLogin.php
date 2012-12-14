<?
	session_start();
	//var_dump($_REQUEST);
	//var_dump($_REQUEST["usuario"]);
	
	// ir a la base de datos y llenar session con los 3 datos de la tabla de usuario
	$usuario = $_REQUEST['usuario'];
	//Conexion a la base de datos
	include("bd.inc");
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	//Validar que no genere error la conexión
	if($con -> connect_error)
		die("Por el momento no se puede acceder al gestor de la base de datos");
	//Crear la consulta
	$mi_query = "select * from usuario where twitter=$usuario";
	//Ejecutar mi consulta
	$result = $con -> query($mi_query);

	//echo '<pre>';
	//var_dump($result);
	//echo '</pre>';
	//Cierro la conexión
	$con -> close();
	
	//meter los datos de la consulta en session
	//var_dump($result);
	if ($result != false) //si se encontró al usuario en la base de datos:
	{
		$datosUsuario = $result -> fetch_assoc();
		$_SESSION["twitter"]=$datosUsuario["twitter"];
		$_SESSION["token_twitter"]=$datosUsuario["token_twitter"];
		$_SESSION["admin"]=$datosUsuario["admin"];
		header("Location: index.php");
	}
	else header("Location: index.php");
	//var_dump($_SESSION);
	
	?>