<?php
	session_start();
	//Crear conexion con la base de datos
	require_once("bd.inc");
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Obtener variables
	$id = $_REQUEST["id"];
	$nomEvento = $_REQUEST["nom_event"];
	$descripcion = $_REQUEST["descripcion"];
	$precio = $_REQUEST["cost_event"];
	$capacidad = $_REQUEST["cap"];
	if($capacidad == "limited") {
		$num_cap = $_REQUEST["cap_event"];
	} else {
		if($capacidad == "ilimited")
			$num_cap = 0;	
	}	
	$categoria = $_REQUEST["cat"];
	$fecha = $_REQUEST["dat_event"];
	
	$tempdate = explode("/", $fecha);
	$fecha = $tempdate[2] . '-' . $tempdate[0] . '-' . $tempdate [1];
	unset($tempdate);
	
	//Realizar validaciones con todas las formas de limpiar variables
	$id = $mysqli -> real_escape_string($id);
	$nomEvento = $mysqli -> real_escape_string($nomEvento);
	$descripcion = $mysqli -> real_escape_string($descripcion);
	$precio = $mysqli -> real_escape_string($precio);
	$capacidad = $mysqli -> real_escape_string($capacidad);
	$num_cap = $mysqli -> real_escape_string($num_cap);
	$categoria = $mysqli -> real_escape_string($categoria);
	$fecha = $mysqli -> real_escape_string($fecha);
	
	$id = htmlentities($id);
	$nomEvento = htmlentities($nomEvento);
	$descripcion = htmlentities($descripcion);
	$precio = htmlentities($precio);
	$capacidad = htmlentities($capacidad);
	$num_cap = htmlentities($num_cap);
	$categoria = htmlentities($categoria);
	$fecha = htmlentities($fecha);
	
	if(preg_match('/[0-9]*/',$id) == 0) {
		header("LOCATION: panelMisEventos.php?error=10");	
	}	
	if(preg_match('/[A-Za-z0-9 _\-\#\@\.\,\:\&]{3,}/', $nomEvento) == 0) {
		header("LOCATION: panelMisEventos.php?error=3");
	}
	if(strlen($descripcion) <= 20){
		header("LOCATION: panelMisEventos.php?error=4");	
	}
	if(preg_match('/[0-9]+/', $precio) == 0) {
		header("LOCATION: panelMisEventos.php?error=5");
	}
	if(preg_match('/-*[0-9]+/',$num_cap) == 0) {
		header("LOCATION: panelMisEventos.php?error=6");	
	}
	if(preg_match('/[0-9]/', $categoria) == 0) {
		header("LOCATION: panelMisEventos.php?error=7");
	}
	if(preg_match('/(20[0-9]{2})-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])/', $fecha) == 0) {
		header("LOCATION: panelMisEventos.php?error=8");
	}
	
	//Se define el tamaño que se permitirá (en KB por eso lo multiplicamos por 1024)
	$tamanioPermitido = 1024 * 1024;

	//Tenemos una lista con las extensiones que aceptaremos
	$extensionesPermitidas = array("jpg", "jpeg", "gif", "png");

	//Obtenemos la extensión del archivo
	$extension = end(explode(".", $_FILES["file"]["name"]));
	
	//Validamos el tipo de archivo, el tamaño en bytes y que la extensión sea válida
	if ((($_FILES["file"]["type"] == "image/gif")
      || ($_FILES["file"]["type"] == "image/jpeg")
      || ($_FILES["file"]["type"] == "image/png")
      || ($_FILES["file"]["type"] == "image/pjpeg")
      || ($_FILES["file"]["type"] == "image/jpg"))
      && ($_FILES["file"]["size"] < $tamanioPermitido)
      && in_array($extension, $extensionesPermitidas)){
              //Si no hubo un error al subir el archivo temporalmente
              if ($_FILES["file"]["error"] > 0){
              		header("LOCATION: ".$_SERVER['REQUEST_URI']."?error=1&code=".$_FILES["file"]["error"]);
              }
              else{
                 	//Se mueve el archivo de su ruta temporal a una ruta establecida
                 	move_uploaded_file($_FILES["file"]["tmp_name"],
                       "upload/" . $_FILES["file"]["name"]);
                 	$file = "upload/" . $_FILES["file"]["name"];
                 	// -------------------------- START Redimension de la imagen --------------------------------------
        			  	$ruta_imagen = $file;
					  	if($extension ==  "gif") {
					  		$imagen = imagecreatefromgif($ruta_imagen);	
						} elseif($extension ==  "png") {
							$imagen = imagecreatefrompng($ruta_imagen);	
							} elseif($extension == "jpeg" || $extension == "jpg" || $extension == "pjpeg") {
								$imagen = imagecreatefromjpeg($ruta_imagen);	
							}
	
							$ancho_original = imagesx($imagen);
							$alto_original = imagesy($imagen);
							$ancho_final = 500;
							$alto_final = ($ancho_final/$ancho_original)*$alto_original;
							$imagen_redimensionada = imagecreatetruecolor($ancho_final, $alto_final);
							imagecopyresampled($imagen_redimensionada, $imagen, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho_original, $alto_original);
							if($extension ==  "gif") {
								imagegif($imagen_redimensionada, $file);
							} elseif($extension ==  "png") {
								imagepng($imagen_redimensionada, $file);	
							} elseif($extension == "jpeg" || $extension == "jpg" || $extension == "pjpeg") {
								imagejpeg($imagen_redimensionada, $file);
							}
	
							imagedestroy($imagen);
							imagedestroy($imagen_redimensionada);		
							// -------------------------- END Redimension de la imagen ----------------------------------------
                   }
	}
	// -------------------------- END Script de carga de imagen ---------------------------------------
	//Ingresamos los datos del evento a la base de datos
	
	if(empty($file) || !isset($file)) {
		$query = "UPDATE evento SET nombre='$nomEvento',descripcion='$descripcion',precio=$precio,capacidad=$num_cap,fechaEvento='$fecha',
				categoria='$categoria' WHERE idevento=$id AND creadoPor=".$_SESSION['access_token']['user_id'];
	} else {
		$query = "UPDATE evento SET nombre='$nomEvento',rutaFlyer='$file', descripcion='$descripcion',precio=$precio,capacidad=$num_cap,fechaEvento='$fecha',
				categoria='$categoria' WHERE idevento=$id AND creadoPor=".$_SESSION['access_token']['user_id'];	
	}

	if(!$mysqli -> query($query)) {
		header("LOCATION: altaEventos.php?error=9");	
	}

	header("Location: panelMisEventos.php?success=2");
?>