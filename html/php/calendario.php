<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="keywords" lang="es" content="HackerGarage, Eventos, Programación Web" />
		<meta name="author" content="lord" />
		<meta name="description" content="Registro de eventos de programación en linea" />
		<script type="text/javascript" src="../js/jquery-1.8.1.min.js"></script>
		<script type="text/javascript" src="../js/fullcalendar.min.js"></script>
		
     <link rel="stylesheet" type='text/css' href='../css/fullcalendar.css' />
       
     <link rel="stylesheet" type='text/css' href="../css/vistacalendario.css"/>
     <title>Calendario</title>
	</head>

	<body>
		<header>
			<h1>Calendario</h1>
		</header>
	<?
		//include 'header.php';
		include 'nav.php';
	?>
	<!-- 
	Se necesitará un php que dibuje <section> y todo lo que ésta contiene. 
	0. poner un for que dibuje 5 sections (por decir algo, 5 por página)
	1. corregir los enlaces por php/blablabla.php 
	2. la fecha y el "alt" se debe sacar de la columna NOMBRE de la tabla EVENTO
	3. las rutas de las imágenes de los flyers DEBEN ESTAR EN LA BASE DE DATOS, por ejemplo en la columna FLYER de la tabla EVENTO
	4. descripción del evento: TEXT_LIBRE
	5. Seguir llenando los datos usando la base de datos.
	  
	-->
	<section id="calendar">
		    <!-- inicializa calendario -->	
			<script>
				$(document).ready(function() {
				    	$('#calendar').fullCalendar({
				    		header: {
								left: 'prev,next today',
								center: 'title',
								right: 'month,basicWeek,basicDay'
								
							},
							editable: 'false',
							events: 'getCalendar.php'
				    })		
				});
			</script>
		</section>
	<?	//include 'footer.php'; ?>
		
	</body>
</html>