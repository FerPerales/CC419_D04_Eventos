<?php
	session_start();
	require_once("funcionesEventos.php");
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment; filename=misEventos.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	
	echo "<table border = '5'>";
	echo "<tr>";
	echo "<th></th>";
	echo "<th> ID </th>";
	echo "<th>Nombre del Evento</th>";
	echo "<th>Descripcion</th>";
	echo "<th>Precio</th>";
	echo "<th>Capacidad</th>";
	echo "<th>Fecha</th>";
	echo "<th>Categoria</th>";
	echo "<th>Estatus </th>";
	echo "<th>Motivo</th>";
	echo "</tr>";
						
	$datos = misEventos ();
									
	if ($datos != NULL )
	{
		foreach($datos as $key => $value) 
		{	
			echo "<tr>";
			echo "<td></td>";
			echo "<td>", $value["idevento"], "</td>";
			echo "<td>", $value["nombre"], "</td>";
			echo "<td>", $value["descripcion"],"</td>";
			echo "<td>$", $value["precio"],".00</td>";
			if($value["capacidad"] == 0)
				echo "<td>Ilimitada</td>";
			else
				echo "<td>", $value["capacidad"],"</td>";
								
			echo "<td>", $value["fechaEvento"],"</td>";
			echo "<td>", $value["categoria"],"</td>";
			echo "<td>", $value["status"]	, "</td>";
			echo "<td>", $value["motivo"], "</td>";
			echo "</tr>";
								
		}
	}
	echo "</table>";				
		
?>