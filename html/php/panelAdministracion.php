<?php 
session_start();
if (!isset($_SESSION["twitter"]))
	header("Location: index.php");
else { 
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="keywords" lang="es" content="HackerGarage, Eventos, Programación Web" />
		<meta name="author" content="Manuel Alejandro Meza Olmedo" />
		<meta name="description" content="Registro de eventos de programación en linea" />
		<title>Eventos</title>
		<link rel="stylesheet" type="text/css" href="../css/fondoymenu.css" />
		<link rel="stylesheet" type="text/css" href="../css/posicionGeneral.css" />
		<link rel="stylesheet" type="text/css" href="../css/panelAdministracion.css" />
		<link rel="stylesheet" type="text/css" href="../css/tooltip.css" />
		<script type="text/javascript" src="../js/panelAdministracion.js"></script>
		<script type="text/javascript" src="../js/jquery-1.8.1.min.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-1.8.23.custom.min.js"></script>
		<script type="text/javascript" src="../js/jquery.blockUI.js"></script>	
		<script type="text/javascript">
			$(document).ready(function() { 
    			$('.buscar').click(function() { 
        			$.blockUI({ 
        				message: $('#search'),
        				onOverlayClick: $.unblockUI
        			}); 
    			}); 
			}); 		
		</script>
	</head>

	<body>
		<div id="container">
		<?
			include 'nav.php'; 
		?> 
			<header class="header" id="header">
				<h1>Administrar Eventos</h1>
			</header>
			<?php
			require_once("funcionesEventos.php");
			if(isset($_REQUEST["buscar"]) || isset($_REQUEST["status"])) {
				
				$buscar = $_REQUEST["buscar"]; 
				$status = $_REQUEST["status"];
				$usuario = $_REQUEST["usuario"];
		
				$datos = search($buscar, $status, $usuario);	
			} else {
				include 'consultaEventosPropuestos.php';
			}
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
								<button type="button" id="check1" name="check1" class="tooltip" >
									<img src="../img/check.jpg" width="15" height="15" alt="Aprobar"></img>
									<span>Aprobar</span>
								</button>	
								<button type="button" id="cross1" name="cross1" class="tooltip" >
									<img src="../img/cross-mark.png" alt="Rechazar" width="15" height="15"></img>
									<span>Rechazar</span>
								</button>
								<button type="button" id="pending1" name="pending1" class="tooltip" >
									<img src="../img/pending.png" alt="Pendiente" width="15" height="15"></img>
									<span>Pendiente</span>
								</button>
								<button type="button" id="buscar1" name="buscar" class="tooltip buscar" >
									<img src="../img/search.png" alt="Buscar" width="15" height="15"></img>
									<span>Buscar</span>
								</button>
								<a href="panelAdministracion.php"><button type="submit" id="ver1" class="tooltip" >
										<img src="../img/see_all.jpg" alt="Ver todo" width="15" height="15"></img>
										<span>Ver todo</span>
								</button></a>
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
	<?php
					if ($datos != NULL)
					{
						foreach ( $datos as $key => $value )
						{
							//echo'<pre>'; var_dump($value); echo'</pre>';
							$colorFondo = 'white';
							if($value["status"]=="cancelado") $colorFondo = '#FF6666;';
							elseif ($value["status"]=="aprobado") $colorFondo = '#99CCFF;';
							echo '<tr>
								<td style="background-color:',$colorFondo,'">
									<input type="checkbox" name="', $value["idevento"], '" value="', $value["idevento"],'" class="comentario" ></input>
									
								</td>
								
								<td style="background-color:',$colorFondo,'">', $value["idevento"], '</td>
								<td style="background-color:',$colorFondo,'">', $value["nombre"], '</td>
								<td style="background-color:',$colorFondo,'">', $value["creadoPor"], '</td>
								<td style="background-color:',$colorFondo,'"><input type="text" value="', $value["motivo"], '" name = "comentarioEvento', 
								$value["idevento"], '" /></td>
							</tr>';
						}
					}
						
	?>
						</table>
						
						<div id="aprobar" class="botonesAprobar">
							<button type="button" id="check2" name="check1" class="tooltip" >
								<img src="../img/check.jpg" alt="Aprobar" width="15" height="15"></img>
								<span>Aprobar</span>
							</button>	
							<button type="button" id="cross2" name="cross1" class="tooltip" >
								<img src="../img/cross-mark.png" alt="Rechazar" width="15" height="15"></img>
								<span>Rechazar</span>
							</button>
							<button type="button" id="pending2" name="pending1" class="tooltip" >
								<img src="../img/pending.png" alt="Pendiente" width="15" height="15"></img>
								<span>Pendiente</span>
							</button>
							<button type="button" id="buscar2" name="buscar" class="tooltip buscar" >
								<img src="../img/search.png" alt="Buscar" width="15" height="15"></img>
								<span>Buscar</span>
							</button>
							<a href="panelAdministracion.php"><button type="submit" id="ver1" class="tooltip" >
										<img src="../img/see_all.jpg" alt="Ver todo" width="15" height="15"></img>
										<span>Ver todo</span>
								</button></a>						
						</div>	
						<div class="clearer"></div>
						<input type="text" name="operacion" style="display:none;" id="operacion" value=""> </input>
						<button type="submit" id="enviar" style="display:none;" ></button>
					</form>
				</section>
			</article>
		<div id="search" style="display:none"  >
			<br />
			<form metho="post" action="panelAdministracion.php" >
				<label for="buscar">Busqueda general: </label>
				<input type="search" id="buscar" name="buscar"/><br />
				
				<fieldset>		
					<legend>Busqueda avanzada</legend>	
					<select name="status" id="status">
						<option value="0">Por estatus</option>
						<option value="pendiente">Pendiente</option>
						<option value="aprobado">Aprobado</option>
						<option value="cancelado">Cancelado</option>			
					</select><br />
					<?php
						$datos = usuarios();
						echo '<select name="usuario" id="usuario">
									<option value="0">Por usuario</option>';
						if($datos != NULL) {
							foreach($datos as $key => $value) {
								echo "<option value='".$value["twitter"]."'>".$value["twitter"]."</option>";	
							} 
						}
						echo '</select>';
					?>		
					</select>
				</fieldset>
				<button type="submit" id="buscar">Buscar</button>
			</form>
			<h6>Si deseas cerrar esta ventana, da click fuera de ella</h6>
		</div>
		<?	include 'footer.php'; ?>
		</div>
	</body>
</html>
<?php } //esta llave cierra if (!isset($_SESSION["twitter"]))
?>
