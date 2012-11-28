<?
	session_start();
	var_dump($_REQUEST);
	var_dump($_REQUEST["usuario"]);
	if($_REQUEST["usuario"] == 1 ) 
		$_SESSION['idusuario'] = 1;
	var_dump($_SESSION);		
	header("Location: index.php");
?>