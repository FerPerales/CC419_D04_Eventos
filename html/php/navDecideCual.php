<?
		if(isset($_SESSION['twitter']))
		{
			var_dump($_SESSION);
			if ($_SESSION["admin"] == 1) //si es administrador:
				require_once 'navAdministrador.php';
			else 	//si NO es administrador 
				require_once 'navUsuarioConEventos.php';
				
				
		}
		else //si nadie está loggeado
			echo 
			'Nadie está loggeado <nav class="navegacion">
				<ul id="menu" class="main-menu">
					<li id="inicio"><a href="index.php">Inicio</a></li>
					<li id="cal"><a href="calendario.php">Calendario</a></li>
					<li id="env-event"><a href="altaEventos.php">Enviar Evento</a></li>
					<li id="inicio-sesion"><a href="login.php?authenticate=1">Iniciar sesión </a></li>
					<li id="RSS"><img src="../img/rss.png" alt="RSS" width="30" height="30" /></li>
					
				</ul>
			</nav>';
?>
