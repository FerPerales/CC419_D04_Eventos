<?php
	//Cargo la sesion actual
	session_start();
	//Limpio la sesion
	session_unset();
	//Destruyo la sesion
	session_destroy(); 
	//Destruyo la cookie
	setcookie(session_name(), '', time()-3600);
	
	header("Location: ../index.php");
?>