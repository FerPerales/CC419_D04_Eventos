<?php 
session_start();
if (!isset($_SESSION["twitter"]))
	header("Location: index.php");
else { 
?>
<?php
	//require_once("funcionesEventos.php");
	$id = $_REQUEST["id"];
	if(isset($id) && !empty($id)) :
		require_once("funcionesEventos.php");
		$evento = modificarEvento($id);
		$categoria = consultaCategorias();
		
		$nombre = $evento["nombre"];
		$flyer = $evento["rutaFlyer"];
		$descripcion = $evento["descripcion"];
		$precio = $evento["precio"];
		$capacidad = $evento["capacidad"];
		$fecha = $evento["fechaEvento"];
		
		$tempdate = explode("-", $fecha);
		$fecha = $tempdate[1] . '/' . $tempdate[2] . '/' . $tempdate [0];
		unset($tempdate);
		
		$idcategoria = $evento["categoria"];
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="keywords" lang="es" content="HackerGarage, Eventos, Programación Web" />
		<meta name="author" content="lord" />
		<meta name="description" content="Registro de eventos de programación en linea" />
		<title>Registro de nuevos eventos</title>
		<link rel="stylesheet" type="text/css" href="../css/ui-lightness/jquery-ui-1.8.23.custom.css" />
		<link rel="stylesheet" type="text/css" href="../css/posicionGeneral.css" />
		<link rel="stylesheet" type="text/css" href="../css/fondoymenu.css" />
		<link rel="stylesheet" type="text/css" href="../css/nuevoEvento.css" />
		
		<script type="text/javascript" src="../js/jquery-1.8.1.min.js" ></script>
		<script type="text/javascript" src="../js/jquery-ui-1.8.23.custom.min.js" ></script>
		<script type="text/javascript" src="../js/jquery.blockUI.js"></script>	

		<?php
			include 'alertsFunction.php'
		?>
		
	</head>

	<body>
		<div id="container">
		<?
			//include 'header.php';
			include 'nav.php';
		?>
			<header>
				<h1>Modificar eventos</h1>
			</header>
		<!-- Instrucciones para index: adecuar a este contexto
		Se necesitará un php que dibuje <section> y todo lo que ésta contiene. 
		0. poner un for que dibuje 5 sections (por decir algo, 5 por página)
		1. corregir los enlaces por php/blablabla.php 
		2. la fecha y el "alt" se debe sacar de la columna NOMBRE de la tabla EVENTO
		3. las rutas de las imágenes de los flyers DEBEN ESTAR EN LA BASE DE DATOS, por ejemplo en la columna FLYER de la tabla EVENTO
		4. descripción del evento: TEXT_LIBRE
		5. Seguir llenando los datos usando la base de datos.
		  
		-->
		<article class="formulario">
			<section>
				<form action="modificarEvento.php" method="post" name="reg_event" enctype="multipart/form-data" >
					<input type="hidden" name="id" value="<?= $id; ?>"/>
					<div>
						<label for="nom_event" class="label-event" >Nombre del evento:</label>
						<input type="text" class="registro" id="nom_event" name="nom_event" value="<?= $nombre; ?>" required/>
					</div>
					<div class="clearer"></div>
					<div>
						<label for="img_event" class="label-event" >Imagen:</label>						
						<input type="file" name="file" class="registro" id="img_event" accept="image/*" value="<?= end(explode('/',$flyer)); ?>" />
						<div class="portaImagen"><img src="<?= $flyer ?>" alt="Imagen"></div>
					</div>
				  <div class="clearer"></div>					
					<div><label for="free_text" class="label-event" >Descripci&oacute;n del evento:</label></div>
					<textarea id="textarea" name="descripcion" rows="8" cols="80" wrap="hard" required placeholder="Escriba aqu&iacute"><?= $descripcion;?></textarea>
					<div class="clearer"></div>
					<div>	
						<label for="cost_event" class="label-event check" >Precio:</label>
						<input type="number" name="cost_event" class="num check" id="cost_event" min="0" step="1" value="<?= $precio;?>"required />
					</div>
					<div class="clearer"></div>
					<div class="radios">
						<span>Capacidad:</span>
							<div>
								<?php 
									if($capacidad == 0)
									echo '<input type="radio" name="cap" class="check" value="unlimited" id="radioIlimitado" checked/>
<span class="label-event check">Ilimitado</span>
</div>
										<input type="radio" name="cap" class="check" value="limited" id="radioLimitado"/>
<span class="label-event check">Limitado</span>
											<input type="number" name="cap_event" id="cap_event" class="check num" min="1" step="1" value="1" disabled/> </div>';
									else {
										echo '<input type="radio" name="cap" class="check" value="unlimited" id="radioIlimitado"/>
<span class="label-event check">Ilimitado</span>
</div>
											<input type="radio" name="cap" class="check" value="limited" id="radioLimitado" checked/>
<span class="label-event check">Limitado</span>
											<input type="number" name="cap_event" id="cap_event" class="check num" min="1" step="1" value="',$capacidad,'" /> </div>';	
									}
								?>			
					<div id="info">
						<label class="label-event" >Categoria</label>
						<select name="cat" >
							<option selected value="0"> Elige una opcion </option>
	<?php
		foreach($categoria as $key => $value) {
			echo '<option value="',$value["idcategoria"],'"';
				if($key+1 == $idcategoria)			
					echo ' selected>',$value["categoria"],'</opcion>';
				else 
					echo '>',$value["categoria"],'</opcion>'; 
		}
	
	?>						
						</select>
					</div>
					<div class="clearer"></div>
					<div>
						<label for="dat_event" id="calendario" class="label-event" >Fecha del evento:</label>
						<input type="text" name="dat_event" id="date_event" placeholder="Día/Mes/Año" required value="<?=$fecha;?>"/>
					</div>
					<div class="clearer"></div>
					<button type="submit" class="boton" id="enviar" name="enviar" >Modificar</button>				
					<div class="clearer"></div>
				</form>
			</section>
		</article>
		<?	include 'footer.php'; ?>
			<script type="text/javascript" src="../js/validacionModificarEvento.js"></script>	
		</div>
	</body>
</html>
<?php
	endif; //cierra el if de si $_REQUEST["id"] estaba set... si no, entonces error, porque se intentó entrar con la url)
	header("Location:404.php");
 }
?>
