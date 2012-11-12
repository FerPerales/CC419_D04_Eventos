<?
	if(sizeof($_REQUEST) == 1)	
		header("Location: ./panelAdministracion.php");
	var_dump($_REQUEST);
	
	$operacion = $_REQUEST["operacion"];
	if($operacion == "check");
	{
		//aprobar los eventos checkeados	
	}
	
	else { //desaprobar 
	}
	
?>