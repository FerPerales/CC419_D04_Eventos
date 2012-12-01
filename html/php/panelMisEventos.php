<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="keywords" lang="es" content="HackerGarage, Eventos, Programación Web" />
		<meta name="author" content="lord" />
		<meta name="description" content="Registro de eventos de programación en linea" />
		<title>Eventos</title>
		<link rel="stylesheet" type="text/css" href="../css/fondoymenu.css" />
		<link rel="stylesheet" type="text/css" href="../css/posicionGeneral.css" />
		<link rel="stylesheet" type="text/css" href="../css/panelAdministracion.css" />
		<!--<script type="text/javascript" src="../js/jquery-1.8.1.min.js" ></script>
		<script type="text/javascript" src="../js/jquery-ui-1.8.23.custom.min.js" ></script>
		<script type="text/javascript" src="../js/jquery.blockUI.js" ></script>
		
		<script>
			$(document).ready(function() {
				$('.modificar').click(function () {
						$.blockUI();
						$('.blockOverlay').attr('title','Click to unblock').click($.unblockUI);					
					});				
				});		
		</script>-->
	</head>

	<body>
		<header class="header" id="header">
			<h1>Mis Eventos</h1>
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
	<article class="container">
			<section class="formulario">		
				<table border = "5">
					<tr>
						<th></th>
						<th> ID </th>
						<th>Nombre del Evento</th>
						<th>Descripcion</th>
						<th>Precio</th>
						<th>Capacidad</th>
						<th>fechaEvento</th>
						<th>Categoria</th>
						<th>Estatus</th>
						<th>Motivo</th>
					</tr>
<?php
					require_once("funcionesEventos.php");
					
					$datos = misEventos ();
					if ($datos != NULL )
					{
						foreach($datos as $key => $value) 
						{
							$colorFondo = 'white';
							if($value["status"]=="cancelado") $colorFondo = '#FF6666;';
							elseif ($value["status"]=="aprobado") $colorFondo = '#99CCFF;';
							
							echo '<tr>
								<td style="background-color:',$colorFondo,'">';
							if($value["status"] == 'PENDIENTE') {
								//echo '<img src="../img/edit.gif" class="modificar" alt="editar" width="25" height="35"/>';
								echo	'<a href="editarEvento.php?id=',$value["idevento"],'"><img src="../img/edit.gif" alt="editar" width="25" height="35"/></a>
									<a href="eventoElimitar.php?id=',$value["idevento"],'"><img src="../img/cross-mark.png" alt="eliminar" width="25" heigth="35"/></a>';
							} elseif($value["status"] == 'cancelado') {
								echo	'<a href="eventoElimitar.php?id=',$value["idevento"],'"><img src="../img/cross-mark.png" alt="eliminar" width="25" heigth="35"/></a>';
							}
							echo	'</td>
								<td style="background-color:',$colorFondo,'">', $value["idevento"], '</td>
								<td style="background-color:',$colorFondo,'">', $value["nombre"], '</td>
								<td style="background-color:',$colorFondo,'">', $value["descripcion"],'</td>
								<td style="background-color:',$colorFondo,'">$', $value["precio"],'.00</td>';
							if($value["capacidad"] == -1)
								echo '<td style="background-color:',$colorFondo,'">Ilimitada</td>';
							else
								echo '<td style="background-color:',$colorFondo,'">', $value["capacidad"],'</td>';
							
							echo '<td style="background-color:',$colorFondo,'">', $value["fechaEvento"],'</td>
								<td style="background-color:',$colorFondo,'">', $value["categoria"],'</td>
								<td style="background-color:',$colorFondo,'">', strtoupper($value["status"]),'</td>
								<td style="background-color:',$colorFondo,'">', $value["motivo"], '</td>
							</tr>';
							
						}
					}
?>
					</table>					
				<div class="clearer"></div>
				<button type="submit" id="enviar" style="display: none;"></button>
			</section>
		</article>
	<?	include 'footer.php'; ?>
		
	</body>
</html>
