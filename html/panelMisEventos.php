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
		<script src="../js/panelAdministracion.js"></script>
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
				<form>
						<div class="botonesSeleccion">
							<button type="button" id="todos">Seleccionar todos</button>
							<button type="button"id="ninguno">Deshacer selección</button>
						</div>		
						<div id="aprobar" class="botonesAprobar">
							<button type="button">
								<img src="../img/cross-mark.png" alt="Rechazar" width="15" height="15"></img>
							</button>
						</div>					
					<table border = "5">
						<tr>
							<th></th>
							<th>ID</th>
							<th>Nombre del Evento</th>
							<th></th>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="evento1" class="editar" ></input>
							</td>
							<td>1</td>
							<td>Evento 1</td>
							<td><input type="button" value="Cambiar flyer"/></td>
						</tr>

						<tr>
							<td>
								<input type="checkbox" name="evento1" class="editar" ></input>
							</td>
							<td>1</td>
							<td>Evento 2</td>
							<td><input type="button" value="Cambiar flyer"/></td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="evento1" class="editar" ></input>
							</td>
							<td>1</td>
							<td>Evento 3</td>
							<td><input type="button" value="Cambiar flyer"/></td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="evento1" class="editar" ></input>
							</td>
							<td>1</td>
							<td>Evento 4</td>
							<td><input type="button" value="Cambiar flyer"/></td>
						</tr>						
						
						
					</table>					
					<div class="clearer"></div>
					<button type="submit" id="enviar" style="display: none;"></button>
				</form>
			</section>
		</article>
	<?	include 'footer.php'; ?>
		
	</body>
</html>
