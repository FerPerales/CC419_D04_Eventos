<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="keywords" lang="es" content="HackerGarage, Eventos, Programación Web" />
		<meta name="author" content="lord" />
		<meta name="description" content="Registro de eventos de programación en linea" />
		<title>Eventos</title>
		<link rel="stylesheet" type="text/css" href="../css/vistablog.css" />
	</head>

	<body>
	<?
	/*
		include 'header.php';
		include 'nav.php';
		include 'article.php';	
		include 'footer.php';*/
		if(isset($_GET["evento"]) ){echo '<h1> isSET </h1>';
		echo'<pre>'; var_dump($_GET);echo'</pre>';}
		echo '<h1> <a href="template1.php?evento=k">kkkkkkkkkkk</a> </h1>';
		echo '<p> bla bla bla </p>';
		$d = $_SERVER[PHP_SELF];
		var_dump($d);
		$d = $_SERVER[SCRIPT_NAME];
		var_dump($d);
		var_dump($_SERVER['SERVER_NAME']);
		var_dump($_GET);
	?>
	</body>
</html>
