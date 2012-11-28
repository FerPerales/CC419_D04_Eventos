<?
 session_start();

		if(isset($_SESSION['idusuario']))
		{
			if ($_SESSION["idusuario"] == 1) //suponemos que el administrador tiene id = 1
				require_once 'navAdministrador.php';
			else 	
				echo 
				'<nav class="navegacion">
					<ul id="menu" class="main-menu">
						<li id="inicio"><a href="index.php">Inicio</a></li>
						<li id="cal"><a href="calendario.php">Calendario</a></li>
						<li id="env-event"><a href="altaEventos.php">Enviar Evento</a></li>
						<li id="inicio-sesion"><a href="cerrarSesion.php">Cerrar sesión</a></li>
						<li id="RSS"><img src="../img/rss.png" alt="RSS" width="30" height="30" /></li>
						
					</ul>
				</nav>';
		}
		else
			echo 
			'<nav class="navegacion">
				<ul id="menu" class="main-menu">
					<li id="inicio"><a href="index.php">Inicio</a></li>
					<li id="cal"><a href="calendario.php">Calendario</a></li>
					<li id="env-event"><a href="altaEventos.php">Enviar Evento</a></li>
					<li id="inicio-sesion"><a href="inicioSesion.php">Iniciar sesión </a></li>
					<li id="RSS"><img src="../img/rss.png" alt="RSS" width="30" height="30" /></li>
					
				</ul>
			</nav>';
?>
