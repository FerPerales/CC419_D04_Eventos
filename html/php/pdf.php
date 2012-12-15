<?php
	session_start();
	require('fpdf/fpdf.php');
	require('bd.inc');
	
	$id =$_REQUEST["id"];

   $query= "select evento.idevento, evento.fechaEvento, evento.nombre, evento.rutaFlyer, evento.descripcion, 
						evento.capacidad, categoria.categoria, usuario.username creadoPor, evento.precio from evento inner join categoria ON 
						evento.categoria=categoria.idcategoria inner join usuario on evento.creadoPor=usuario.twitter 
						where idevento = ".$id." and status='aprobado'";
      
   $con = new mysqli($dbhost, $dbuser, $dbpass, $db);
   if($con -> connect_error)
		header("Location: ".$_SERVER["REQUEST_URI"]."?error=11");
		
	$result = $con -> query($query);
	$con -> close();
	
	if ( $result != false) // cuando la consulta sí dio algo
	{
		$cuantosRenglones = $result -> num_rows;
		if($cuantosRenglones >= 1)
		{
			//Por cada fila obtengo un arreglo
			$fila = $result -> fetch_assoc();
		}	
	}
     
	class PDF extends FPDF{
		function Header() {
			$this -> SetFont('Courier','B',35);
			$this -> Cell(0,15,'Evento',0,1,'C');
		}	
	}

	$pdf= new PDF();
	$pdf -> AddPage();
	$pdf -> SetFont('Arial','B',16);

	$pdf -> Cell(0,10,"".utf8_decode($fila['nombre']),1,2,'L');
	$pdf -> Image($fila['rutaFlyer'],40,40,-100,0);
	$pdf -> Cell(120,150,"",0,2,'C');

	$pdf -> SetFont('Arial','',12);
	$str=$fila['descripcion'];	
	$str= str_replace("&nbsp;"," ", $str);
	$str= str_replace("<div>"," ", $str);
	$str= str_replace("</div>"," ", $str);
	$str= str_replace("<br>"," ", $str);
	$pdf -> Cell(80,10,"Cuando: ".$fila['fechaEvento'],0,2,'L');
	$pdf -> Cell(80,10,"Descripcion: ",0,2,'L');	
	$pdf -> MultiCell(0,8,$str, 0, 'J');
	$pdf -> Cell(80,10,"Donde: HackerGarage, Vidrio #2188, entre Simon Bolivar y Gral. San Martin, Guadalajara.",0,2,'L');
	$pdf -> Cell(120,10,"Precio: $".$fila['precio'].
	".00     Categoria: ".$fila['categoria']."      Categoria: ".$fila['categoria'],0,2,'L');
	if($fila['capacidad'] == 0)
		$pdf -> Cell(120,10,"Capacidad: Ilimitada",0,0,'L');
	else	
		$pdf -> Cell(120,10,"Capacidad: ".$fila['capacidad'],0,0,'L');
	$pdf -> Cell(120,10,"twitter por:  @".$fila['creadoPor'] ,0,2,'L');

	$pdf -> Output();
?>