<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="keywords" lang="es" content="HackerGarage, Eventos, Programación Web" />
		<meta name="author" content="lord" />
		<meta name="description" content="Registro de eventos de programación en linea" />
		<title>Detalle de evento</title>
		<link rel="stylesheet" type="text/css" href="../css/vistadetalle.css" />

	</head>

	<body>
	<?
		include 'header.php';
		include 'nav.php';
		$evento = $_GET["evento"]; 

		if(isset($evento) )
		{
			
			include 'consultaEventoDetalle.php';
			//$capacidad = htmlentities($capacidad, ENT_QUOTES,'UTF-8');
			$descripcion = htmlentities($fila["descripcion"], ENT_QUOTES,'UTF-8');
			$fechaEvento = htmlentities($fila["fechaEvento"], ENT_QUOTES,'UTF-8');
			$idevento = htmlentities($fila["idevento"], ENT_QUOTES,'UTF-8');
			$nombre = htmlentities($fila["nombre"], ENT_QUOTES,'UTF-8');
			$rutaFlyer = htmlentities($fila["rutaFlyer"], ENT_QUOTES,'UTF-8');
			$capacidad = htmlentities($fila["capacidad"], ENT_QUOTES,'UTF-8');
			$descripcion = htmlentities($fila["descripcion"], ENT_QUOTES,'UTF-8');
			$precio = htmlentities($fila["precio"], ENT_QUOTES,'UTF-8');
			$creadoPor = htmlentities($fila["creadoPor"], ENT_QUOTES,'UTF-8');
			$categoria = htmlentities($fila["categoria"], ENT_QUOTES,'UTF-8');
			
			echo '<article class="articulo">
			<section class="evento">
				<div class="detalle">
					<h3>',$fechaEvento, ': ', html_entity_decode($nombre), '</h3>
					<div>
						<div class="foto">
							<img src="', $rutaFlyer, '" alt="Evento Hackers and Founders" />
							<p>', html_entity_decode($descripcion), '</p>
						</div>
						
						<p>Cuando: <span class="place" id="cuando">', $fechaEvento, '</span></p>
						<p>Donde: <span class="place" id="donde">HackerGarage, Vidrio #2188, entre Simón Bolivar y Gral. San Martín, Guadalajara.</span></p>
						<p class="place" id="more-inf">
						Precio: <span class="place" id="precio">$', $precio, '</span> ';
						if($capacidad == -1)
							echo 'Capacidad: <span class="place" id="capacidad"> Ilimitada </span> ';
						else
							echo	'Capacidad: <span class="place" id="capacidad">', $capacidad, '</span> ';
						echo		'Categoría: <span class="place" id="categoria"><a href="" >', $categoria, '</a></span> Publicado el ', $fechaEvento, ' por  
						<span class="place" id="quien"><a href="" >', $creadoPor, '</a></span>
					</p>
					</div>
				</div>
				<div class="info" id="event-det">
					
				</div>';  
				include 'disqus.php';
				echo 
				'</section>
		</article>	';
		}
		
	?>
	</body>
</html>