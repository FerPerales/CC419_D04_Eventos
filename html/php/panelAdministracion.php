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
			<h1>Nuevos Eventos</h1>
		</header>
	<?
		//include 'header.php';
		include 'nav.php';
		include 'consultaEventosPropuestos.php';
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
				<form action="panelAdminFunciones.php" method="get" >
				
					<div>
						<div class="botonesSeleccion">
							<button type="button" id="todos">Seleccionar todos</button>
							<button type="button"id="ninguno">Deshacer selección</button>
						</div>	
						<div id="aprobar" class="botonesAprobar">
							<button type="button" id="check1" name="check1">
								<img src="../img/check.jpg" alt="Aprobar" width="15" height="15"></img>
							</button>	
							<button type="button" id="cross1" name="cross1">
								<img src="../img/cross-mark.png" alt="Rechazar" width="15" height="15"></img>
							</button>
						</div>	
					</div>
					<table border = "5">
						<tr>
							<th></th>
							<th>ID</th>
							<th>Nombre del Evento</th>
							<th>Remitente</th>
							<th>Comentarios</th>
						</tr>
<?
					foreach ( $datos as $key => $value )
					{
						$colorFondo = 'white';
						if($value["status"]=="cancelado") $colorFondo = '#FF6666;';
						elseif ($value["status"]=="aprobado") $colorFondo = '#99CCFF;';
						echo '<tr>
							<td style="background-color:',$colorFondo,'">
								<input type="checkbox" name="', $value["idevento"], '" value="0" class="comentario" ></input>
								
							</td>
							
							<td style="background-color:',$colorFondo,'">', $value["idevento"], '</td>
							<td style="background-color:',$colorFondo,'">', $value["nombre"], '</td>
							<td style="background-color:',$colorFondo,'">', $value["creadoPor"], '</td>
							<td style="background-color:',$colorFondo,'"><input type="text" /></td>
						</tr>';
					}
					
?>
					</table>
					<div class="botonesAprobar">
						<button type="button" id="check2" name="check2" onclick="aprobarEventos()">
							<img src="../img/check.jpg" alt="Aprobar" width="15" height="15"></img>
						</button>	
						<button type="button" id="cross2" name="cross2" onclick="desaprobarEventos()">
							<img src="../img/cross-mark.png" alt="Rechazar" width="15" height="15"></img>
						</button>
					</div>	
					<div class="clearer"></div>
					<input type="text" name="operacion" id="operacion" style="display:none;" value=""></input>
					<button type="submit" id="enviar" style="display: none;"></button>
				</form>
			</section>
		</article>
	<?	include 'footer.php'; ?>
		
	</body>
</html>
