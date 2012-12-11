<?php
	if(isset($_REQUEST["success"]) && $_REQUEST["success"] == 1) {
?>
	<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.success1'), 
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
<?php
	}
	if(isset($_REQUEST["success"]) && $_REQUEST["success"] == 2) {
?>
	<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.success2'), 
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
<?php
	}
	if(isset($_REQUEST["error"]) && $_REQUEST["error"] == 0) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.error0'), 
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
<?php
	}
	if(isset($_REQUEST["error"]) && $_REQUEST["error"] == 1) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.error1'), 
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
<?php
	}
if(isset($_REQUEST["error"]) && $_REQUEST["error"] == 2) {
?>
<script type="text/javascript" >
		$(document).ready(function() { 
    		  $.blockUI({ 
          		message: $('div.error2'), 
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
<?php
	}
?>

<div class="success1" style="display: none;">
      <h3>Exito!</h3>
      <h4>Su evento se ha dado de alta de manera exitosa</h4>
</div>

<div class="success2" style="display: none;">
      <h3>Exito!</h3>
      <h4>El evento fue modificado de manera exitosa</h4>
</div>

<div class="error0" style="display: none;">
      <h3>Error!</h3>
      <h4>La imagen no es valida</h4>
</div>

<div class="error1" style="display: none;">
      <h3>Error!</h3>
      <h4>Codigo de error: <?= $_REQUEST["code"]?></h4>
</div>

<div class="error2" style="display: none;">
      <h3>Error!</h3>
      <h4>La imagen ya existe</h4>
</div>