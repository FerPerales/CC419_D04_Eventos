<?php session_start(); ?>
<?php
	/*if(sizeof($_REQUEST) == 1)	
		header("Location: ./panelAdministracion.php");
		//echo '<pre>';
	var_dump($_REQUEST);
		//echo '</pre>';
	
	*/
	$operacion = $_REQUEST["operacion"];
	//var_dump($operacion);
	if($operacion == "check") //aprobar los eventos checkeados	
	{
		//conectar a la base de datos
		require_once("bd.inc");
		$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
		//Validar que no genere error la conexión
		if($con -> connect_error)
			header("Location: ".$_SERVER["REQUEST_URI"]."?error=11");


		//para cada evento checked:
		foreach($_REQUEST as $key => $value)
		{
			//si es número, metelo a idevento
			//si no es numero, metelo a motivo
			//echo'key: ', $key, ' ';
			if($key != "operacion" && $value != "" && preg_match('/[0-9]/', $value) == 1) 
			{ 
				$idevento = $value;
				//echo '<br>se asigno a idevento: ', $idevento.'<br>';
			} 
			elseif($key != "operacion" && isset($idevento)) 
			{
				
				$motivo = $value;
				//echo '<br> se asigno a motivo: ', $motivo.'<br>';
				//crear la consulta
				$mi_query = "UPDATE evento SET status='aprobado', motivo='$motivo' WHERE idevento = $idevento ";
				//ejecutar la consulta
				$ejecuta = $con -> query($mi_query);
				unset($idevento);
			}				
		}
		
		//Cierro la conexión
		$con -> close();
	}
	
	if( $operacion == "cross")  	//cancelar
	{ 
 		//conectar a la base de datos
		require_once("bd.inc");
		$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
		//Validar que no genere error la conexión
		if($con -> connect_error)
			header("Location: ".$_SERVER["REQUEST_URI"]."?error=11");


		//para cada evento checked:
		foreach($_REQUEST as $key => $value)
		{
			//si es número, metelo a idevento
			//si no es numero, metelo a motivo
			if($key != "operacion" && $value != "" && preg_match('/[0-9]/', $value) == 1) 
			{ 
				$idevento = $value;
				//echo 'se asigno a idevento ', $idevento.'<br>';
			} 
			elseif($key != "operacion" && isset($idevento)) 
			{
				
				$motivo = $value;
				//echo $motivo.'<br>';
				//crear la consulta
				$mi_query = "UPDATE evento SET status='cancelado', motivo='$motivo' WHERE idevento = $idevento ";
				//ejecutar la consulta
				$ejecuta = $con -> query($mi_query);
				unset($idevento);
				
			}				
		}
		//Cierro la conexión
		$con -> close();
	}
	
	if( $operacion == "pending")  	//resetear a pendiente
	{ 
 		//conectar a la base de datos
		require_once("bd.inc");
		$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
		//Validar que no genere error la conexión
		if($con -> connect_error)
			header("Location: ".$_SERVER["REQUEST_URI"]."?error=11");


		//para cada evento checked:
		foreach($_REQUEST as $key => $value)
		{
			//si es número, metelo a idevento
			//si no es numero, metelo a motivo
			if($key != "operacion" && $value != "" && preg_match('/[0-9]/', $value) == 1) 
			{ 
				$idevento = $value;
				//echo 'se asigno a idevento ', $idevento.'<br>';
			} 
			elseif($key != "operacion" && isset($idevento)) 
			{
				$motivo = $value;
				//echo $motivo.'<br>';
				//crear la consulta
				$mi_query = "UPDATE evento SET status='pendiente', motivo='$motivo' WHERE idevento = $idevento ";
				
				//ejecutar la consulta
				$ejecuta = $con -> query($mi_query);
				unset($idevento);
				
			}				
		}
		
		//Cierro la conexión
		$con -> close();
	}
	header("Location: ./panelAdministracion.php");
?>