<?php
	session_start();
	require_once("bd.inc");
	header('Content-Type: text/html; charset=utf-8');
	$mysql = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Obtener variables
	$quienCrea = $_SESSION["access_token"]["user_id"];
	$nomEvento = $_REQUEST["nom_event"];
	$descripcion = $_REQUEST["descripcion"];
	$precio = $_REQUEST["cost_event"];
	$capacidad = $_REQUEST["cap"];
	if($capacidad == "limited") {
		$num_cap = $_REQUEST["cap_event"];
	} else {
		if($capacidad == "unlimited")
			$num_cap = 0;	
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
	
	$nomEvento = htmlentities($nomEvento, ENT_QUOTES,'UTF-8');
	$descripcion = htmlentities($descripcion, ENT_QUOTES,'UTF-8');
	$precio = htmlentities($precio, ENT_QUOTES,'UTF-8');
	$capacidad = htmlentities($capacidad, ENT_QUOTES,'UTF-8');
	$num_cap = htmlentities($num_cap, ENT_QUOTES,'UTF-8');
	$categoria = htmlentities($categoria, ENT_QUOTES,'UTF-8');
	$fecha = htmlentities($fecha, ENT_QUOTES,'UTF-8');

	if(preg_match('/[A-Za-z0-9 _\-\#\@\.\,\:\&]{8,}/', $nomEvento) == 0) {
		header("LOCATION: altaEventos.php?error=3");
	}
	if(strlen($descripcion) <= 20){
		header("LOCATION: altaEventos.php?error=4");	
	}
	if(preg_match('/[0-9]+/', $precio) == 0) {
		header("LOCATION: altaEventos.php?error=5");
	}
	if(preg_match('/[0-9]+/',$num_cap) == 0) {
		header("LOCATION: altaEventos.php?error=6");	
	}
	if(preg_match('/[0-9]/', $categoria) == 0) {
		header("LOCATION: altaEventos.php?error=7");
	}
	if(preg_match('/(20[0-9]{2})-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])/', $fecha) == 0) {
		header("LOCATION: altaEventos.php?error=8");
	}
	
	// -------------------------- START Script de carga de imagen -------------------------------------
	//Se define el tamaño que se permitirá (en KB por eso lo multiplicamos por 1024)
	$tamanioPermitido = 1024 * 1024;

	//Tenemos una lista con las extensiones que aceptaremos
	$extensionesPermitidas = array("jpg", "jpeg", "gif", "png");

	//Obtenemos la extensión del archivo
	$extension = end(explode(".", $_FILES["file"]["name"]));
	
	//Validamos el tipo de archivo, el tamaño en bytes y que la extensión sea válida
	$query = "SELECT MAX(idevento) AS id from evento";
	$result = $mysql -> query($query);
	$last_id = $result -> fetch_assoc();
	if(empty($last_id["id"]))
	 $last_id["id"] = 1;
	if ((($_FILES["file"]["type"] == "image/gif")
      || ($_FILES["file"]["type"] == "image/jpeg")
      || ($_FILES["file"]["type"] == "image/png")
      || ($_FILES["file"]["type"] == "image/pjpeg")
      || ($_FILES["file"]["type"] == "image/jpg"))
      && ($_FILES["file"]["size"] < $tamanioPermitido)
      && in_array($extension, $extensionesPermitidas)){
              //Si no hubo un error al subir el archivo temporalmente
              if ($_FILES["file"]["error"] > 0){
              		header("LOCATION: altaEventos.php?error=1&code=".$_FILES["file"]["error"]);
              }
              else{
                    //Si el archivo ya existe se muestra el mensaje de error
                    if (file_exists("upload/Evento".$last_id['id'].".".$extension)){
                    		header("LOCATION: altaEventos.php?error=2");
                    }
                    else{
                           //Se mueve el archivo de su ruta temporal a una ruta establecida
                           move_uploaded_file($_FILES["file"]["tmp_name"],
                                   "upload/Evento".$last_id['id'].".".$extension);
                           $file = "upload/Evento".$last_id['id'].".".$extension;
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
	}
	else{
   		header("LOCATION: altaEventos.php?error=0");
	}
	// -------------------------- END Script de carga de imagen ---------------------------------------
	//Ingresamos los datos del evento a la base de datos
	$query = "INSERT INTO evento(creadoPor, nombre, rutaFlyer, descripcion,precio,capacidad,fechaEvento,fechaCreacion,status,categoria) 
					VALUES ('$quienCrea','$nomEvento','$file','$descripcion',$precio,$num_cap,'$fecha','$fechaActual','pendiente',$categoria)";
	
	if(!$mysql -> query($query)) {
		header("LOCATION: altaEventos.php?error=9");
	}
	include 'enviarTweet.php';
	$tweet = "Hola @".$_SESSION['twitter'] ."!. Tu evento esta en lista de espera para ser aprobado. Saludos!";
	$callback = post_tweet($tweet);
	header("Location: index.php?success=1");
?>