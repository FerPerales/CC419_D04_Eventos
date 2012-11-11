<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="keywords" lang="es" content="HackerGarage, Eventos, Programación Web" />
		<meta name="author" content="lord" />
		<meta name="description" content="Registro de eventos de programación en linea" />
		<title>Detalle de evento</title>
		<link rel="stylesheet" type="text/css" href="../css/vistadetalle.css" />

	</head>

	<body>
	<?
		include 'header.php';
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
		<article class="articulo">
			<section class="evento">
				<div class="detalle">
					<h3>Jueves 30: Hackers and Founders</h3>
					<div>
						<div class="foto">
							<img src="../img/HF.jpg" alt="Evento Hackers and Founders" />
							<p>
								Hackers &amp; founders es una comunidad tecnológica basada en la pregunta ¿Qué Necesitas? 
								Conoce a tus futuros socios, solicita ayuda, aprende y emprende. Nos reunimos el último Jueves del mes.
							</p>
						</div>
						
						<p>Cuando: <span class="place" id="cuando">Jueves 30 de Agosto de 2012 19:00 hrs</span></p>
						<p>Donde: <span class="place" id="donde">HackerGarage, Vidrio #2188, entre Simón Bolivar y Gral. San Martín, Guadalajara.</span></p>
					</div>
				</div>
				<div class="info" id="event-det">
					<p class="place" id="more-inf">
						Precio: <span class="place" id="precio">$50.00</span> 
						Capacidad: <span class="place" id="capacidad">50</span> 
						Categoría: <span class="place" id="categoria"><a href="" >Conferencia</a></span> Publicado el 23/09/12 por 
						<span class="place" id="quien"><a href="" >@levhita</a></span>
					</p>
				</div>
			
				<div class="disqus_commit">
	        		<div id="disqus_thread">
		  				<script type="text/javascript">
		            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
		            var disqus_shortname = 'hawreghi'; // required: replace example with your forum shortname
		            /* * * DON'T EDIT BELOW THIS LINE * * */
		            (function() {
		                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		                dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
		                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		            })();
		        		</script>
		        		<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		        		<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
	        		</div>
				</div>
			</section>
		</article>		
	</body>
</html>