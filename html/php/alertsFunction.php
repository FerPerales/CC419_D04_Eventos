<?php
	if(isset($_REQUEST["success"]) && $_REQUEST["success"] == 1) {
?>
	<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.msg'), 
           		fadeIn: 700, 
           		fadeOut: 700, 
           		timeout: 5000, 
           		showOverlay: false, 
           		centerY: false, 
           		css: { 
              		width: '350px', 
              		top: '10px', 
              		left: '', 
              		right: '10px', 
              		border: 'none', 
              		padding: '5px', 
              		backgroundColor: '#FFF', 
              		'-webkit-border-radius': '10px', 
              		'-moz-border-radius': '10px', 
              		opacity: .6, 
              		color: '#000' 
           		} 
     			});  
			}); 
	</script>
	<div class="msg" style="display: none;">
      <h3>Exito!</h3>
      <h4>Su evento se ha dado de alta de manera exitosa</h4>
	</div>
<?php
	}
	elseif(isset($_REQUEST["success"]) && $_REQUEST["success"] == 2) {
?>
	<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.msg'), 
           		fadeIn: 700, 
           		fadeOut: 700, 
           		timeout: 5000, 
           		showOverlay: false, 
           		centerY: false, 
           		css: { 
              		width: '350px', 
              		top: '10px', 
              		left: '', 
              		right: '10px', 
              		border: 'none', 
              		padding: '5px', 
              		backgroundColor: '#FFF', 
              		'-webkit-border-radius': '10px', 
              		'-moz-border-radius': '10px', 
              		opacity: .6, 
              		color: '#000' 
           		} 
     			});  
			}); 
	</script>	

	<div class="msg" style="display: none;">
      <h3>Exito!</h3>
      <h4>El evento fue modificado de manera exitosa</h4>
	</div>
<?php
	}
	elseif(isset($_REQUEST["success"]) && $_REQUEST["success"] == 3) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.msg'), 
           		fadeIn: 700, 
           		fadeOut: 700, 
           		timeout: 5000, 
           		showOverlay: false, 
           		centerY: false, 
           		css: { 
              		width: '350px', 
              		top: '10px', 
              		left: '', 
              		right: '10px', 
              		border: 'none', 
              		padding: '5px', 
              		backgroundColor: '#FFF', 
              		'-webkit-border-radius': '10px', 
              		'-moz-border-radius': '10px', 
              		opacity: .6, 
              		color: '#000' 
           		} 
     			});  
			}); 
	</script>

	<div class="msg" style="display: none;">
      <h3>Exito!</h3>
      <h4>El evento fue eliminado</h4>
	</div>
<?php
	}
	elseif(isset($_REQUEST["error"]) && $_REQUEST["error"] == 0) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.msg'), 
           		fadeIn: 700, 
           		fadeOut: 700, 
           		timeout: 5000, 
           		showOverlay: false, 
           		centerY: false, 
           		css: { 
              		width: '350px', 
              		top: '10px', 
              		left: '', 
              		right: '10px', 
              		border: 'none', 
              		padding: '5px', 
              		backgroundColor: '#FFF', 
              		'-webkit-border-radius': '10px', 
              		'-moz-border-radius': '10px', 
              		opacity: .6, 
              		color: '#000' 
           		} 
     			});  
			}); 
	</script>

	<div class="msg" style="display: none;">
      <h3>Error!</h3>
      <h4>La imagen no es valida</h4>
	</div>
<?php
	}
	elseif(isset($_REQUEST["error"]) && $_REQUEST["error"] == 1) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.msg'), 
           		fadeIn: 700, 
           		fadeOut: 700, 
           		timeout: 5000, 
           		showOverlay: false, 
           		centerY: false, 
           		css: { 
              		width: '350px', 
              		top: '10px', 
              		left: '', 
              		right: '10px', 
              		border: 'none', 
              		padding: '5px', 
              		backgroundColor: '#FFF', 
              		'-webkit-border-radius': '10px', 
              		'-moz-border-radius': '10px', 
              		opacity: .6, 
              		color: '#000' 
           		} 
     			});  
			}); 
	</script>
	<div class="msg" style="display: none;">
      <h3>Error!</h3>
      <h4>Codigo de error: <?= $_REQUEST["code"]?></h4>
	</div>
<?php
	}
	elseif(isset($_REQUEST["error"]) && $_REQUEST["error"] == 2) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.msg'), 
           		fadeIn: 700, 
           		fadeOut: 700, 
           		timeout: 5000, 
           		showOverlay: false, 
           		centerY: false, 
           		css: { 
              		width: '350px', 
              		top: '10px', 
              		left: '', 
              		right: '10px', 
              		border: 'none', 
              		padding: '5px', 
              		backgroundColor: '#FFF', 
              		'-webkit-border-radius': '10px', 
              		'-moz-border-radius': '10px', 
              		opacity: .6, 
              		color: '#000' 
           		} 
     			});  
			}); 
	</script>
	<div class="msg" style="display: none;">
      <h3>Error!</h3>
      <h4>La imagen ya existe</h4>
	</div>
<?php
	}
	elseif(isset($_REQUEST["error"]) && $_REQUEST["error"] == 3) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.msg'), 
           		fadeIn: 700, 
           		fadeOut: 700, 
           		timeout: 5000, 
           		showOverlay: false, 
           		centerY: false, 
           		css: { 
              		width: '350px', 
              		top: '10px', 
              		left: '', 
              		right: '10px', 
              		border: 'none', 
              		padding: '5px', 
              		backgroundColor: '#FFF', 
              		'-webkit-border-radius': '10px', 
              		'-moz-border-radius': '10px', 
              		opacity: .6, 
              		color: '#000' 
           		} 
     			});  
			}); 
	</script>
	<div class="msg" style="display: none;">
      <h3>Error!</h3>
      <h4>El nombre del evento cuenta con caracteres invalido o menor a 8 caracteres </h4>
	</div>
<?php
	}
	elseif(isset($_REQUEST["error"]) && $_REQUEST["error"] == 4) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.msg'), 
           		fadeIn: 700, 
           		fadeOut: 700, 
           		timeout: 5000, 
           		showOverlay: false, 
           		centerY: false, 
           		css: { 
              		width: '350px', 
              		top: '10px', 
              		left: '', 
              		right: '10px', 
              		border: 'none', 
              		padding: '5px', 
              		backgroundColor: '#FFF', 
              		'-webkit-border-radius': '10px', 
              		'-moz-border-radius': '10px', 
              		opacity: .6, 
              		color: '#000' 
           		} 
     			});  
			}); 
	</script>
	<div class="msg" style="display: none;">
      <h3>Error!</h3>
      <h4>La descripcion cuenta con caracteres invalidos o menos de 20 caracteres </h4>
	</div>
<?php
	}
	elseif(isset($_REQUEST["error"]) && $_REQUEST["error"] == 5) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.msg'), 
           		fadeIn: 700, 
           		fadeOut: 700, 
           		timeout: 5000, 
           		showOverlay: false, 
           		centerY: false, 
           		css: { 
              		width: '350px', 
              		top: '10px', 
              		left: '', 
              		right: '10px', 
              		border: 'none', 
              		padding: '5px', 
              		backgroundColor: '#FFF', 
              		'-webkit-border-radius': '10px', 
              		'-moz-border-radius': '10px', 
              		opacity: .6, 
              		color: '#000' 
           		} 
     			});  
			}); 
	</script>
	<div class="msg" style="display: none;">
      <h3>Error!</h3>
      <h4>El precio es incorrecto </h4>
	</div>
<?php
	}
	elseif(isset($_REQUEST["error"]) && $_REQUEST["error"] == 6) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.msg'), 
           		fadeIn: 700, 
           		fadeOut: 700, 
           		timeout: 5000, 
           		showOverlay: false, 
           		centerY: false, 
           		css: { 
              		width: '350px', 
              		top: '10px', 
              		left: '', 
              		right: '10px', 
              		border: 'none', 
              		padding: '5px', 
              		backgroundColor: '#FFF', 
              		'-webkit-border-radius': '10px', 
              		'-moz-border-radius': '10px', 
              		opacity: .6, 
              		color: '#000' 
           		} 
     			});  
			}); 
	</script>
	<div class="msg" style="display: none;">
      <h3>Error!</h3>
      <h4>La capacidad es incorrecta </h4>
	</div>
<?php
	}
	elseif(isset($_REQUEST["error"]) && $_REQUEST["error"] == 7) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.msg'), 
           		fadeIn: 700, 
           		fadeOut: 700, 
           		timeout: 5000, 
           		showOverlay: false, 
           		centerY: false, 
           		css: { 
              		width: '350px', 
              		top: '10px', 
              		left: '', 
              		right: '10px', 
              		border: 'none', 
              		padding: '5px', 
              		backgroundColor: '#FFF', 
              		'-webkit-border-radius': '10px', 
              		'-moz-border-radius': '10px', 
              		opacity: .6, 
              		color: '#000' 
           		} 
     			});  
			}); 
	</script>
	<div class="msg" style="display: none;">
      <h3>Error!</h3>
      <h4>La categoria es incorrecta </h4>
	</div>
<?php
	}
	elseif(isset($_REQUEST["error"]) && $_REQUEST["error"] == 8) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.msg'), 
           		fadeIn: 700, 
           		fadeOut: 700, 
           		timeout: 5000, 
           		showOverlay: false, 
           		centerY: false, 
           		css: { 
              		width: '350px', 
              		top: '10px', 
              		left: '', 
              		right: '10px', 
              		border: 'none', 
              		padding: '5px', 
              		backgroundColor: '#FFF', 
              		'-webkit-border-radius': '10px', 
              		'-moz-border-radius': '10px', 
              		opacity: .6, 
              		color: '#000' 
           		} 
     			});  
			}); 
	</script>
	<div class="msg" style="display: none;">
      <h3>Error!</h3>
      <h4>La categoria es incorrecta </h4>
	</div>
<?php
	}
	elseif(isset($_REQUEST["error"]) && $_REQUEST["error"] == 9) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.msg'), 
           		fadeIn: 700, 
           		fadeOut: 700, 
           		timeout: 5000, 
           		showOverlay: false, 
           		centerY: false, 
           		css: { 
              		width: '350px', 
              		top: '10px', 
              		left: '', 
              		right: '10px', 
              		border: 'none', 
              		padding: '5px', 
              		backgroundColor: '#FFF', 
              		'-webkit-border-radius': '10px', 
              		'-moz-border-radius': '10px', 
              		opacity: .6, 
              		color: '#000' 
           		} 
     			});  
			}); 
	</script>
	<div class="msg" style="display: none;">
      <h3>Error fatal!</h3>
      <h4>No fue posible ingresar los datos de su evento. Vuelva a intentarlo </h4>
	</div>
<?php
	}
	elseif(isset($_REQUEST["error"]) && $_REQUEST["error"] == 10) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.msg'), 
           		fadeIn: 700, 
           		fadeOut: 700, 
           		timeout: 5000, 
           		showOverlay: false, 
           		centerY: false, 
           		css: { 
              		width: '350px', 
              		top: '10px', 
              		left: '', 
              		right: '10px', 
              		border: 'none', 
              		padding: '5px', 
              		backgroundColor: '#FFF', 
              		'-webkit-border-radius': '10px', 
              		'-moz-border-radius': '10px', 
              		opacity: .6, 
              		color: '#000' 
           		} 
     			});  
			}); 
	</script>
	<div class="msg" style="display: none;">
      <h3>Error fatal!</h3>
      <h4>El id del evento no coincide </h4>
	</div>
<?php
	}
	elseif(isset($_REQUEST["error"]) && $_REQUEST["error"] == 11) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.msg'), 
           		fadeIn: 700, 
           		fadeOut: 700, 
           		timeout: 5000, 
           		showOverlay: false, 
           		centerY: false, 
           		css: { 
              		width: '350px', 
              		top: '10px', 
              		left: '', 
              		right: '10px', 
              		border: 'none', 
              		padding: '5px', 
              		backgroundColor: '#FFF', 
              		'-webkit-border-radius': '10px', 
              		'-moz-border-radius': '10px', 
              		opacity: .6, 
              		color: '#000' 
           		} 
     			});  
			}); 
	</script>
	<div class="msg" style="display: none;">
      <h3>Error fatal!</h3>
      <h4>No se puede acceder al gestor de base de datos </h4>
	</div>
<?php
	}
?>

