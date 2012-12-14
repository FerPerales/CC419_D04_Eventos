<?php
	require_once('bd.inc');
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);

	if($con -> connect_error)
		die('Por el momento no se puede acceder al gestor de la base de datos');
	$mi_query = "SELECT * FROM evento LEFT JOIN categoria ON evento.categoria=categoria.idcategoria 
					where status = 'aprobado' ORDER BY fechaCreacion DESC";
	
	//Ejecuto mi consulta
	$result = $con -> query($mi_query);
	
	//Cierro la conexión
	$con -> close();

	header('Content-type: text/xml');
	echo '<?xml version="1.0" encoding ="ISO-8859-1"?>';
	echo '<rss version="2.0">';
	echo '<channel>';
	echo '<title>Eventos en HackerGarage</title>';
	echo '<link>http://hackergarage.mx</link>';
	echo '<description>Todo es sobre comunidad</description>';
	


	if($result -> num_rows >= 1){
		
		//Por cada fila obtengo un arreglo		
		while($fila = $result -> fetch_assoc()){
			echo '<item>';
            echo '<title>'.$fila["nombre"].'</title>';         
		    echo '<link>vistaDetalle.php?evento='.$fila["idevento"].'</link>';
            echo '<description>'.$fila["descripcion"].'</description></item>';
		}					
	}

	echo '</channel>';
	echo '</rss>';
?>