<?php 
sleep(1);
if(isset($_REQUEST['correo']) && $_REQUEST['correo']!=""){
	
	$mail = $_REQUEST['correo'];
	
	if(comprobar_mail($mail)){/*Si la funcion devuelve TRUE, osea que si esta correcto muestro un mensaje o lo que quiera mostrar*/ 
        echo '<div align="center" id="Success">Disponible</div>';
	}else{ 
        echo '<div align="center" id="Error">No disponible</div>';
	}
	
	
	function comprobar_mail($mail){ 
  		if(!ereg('^([a-zA-Z0-9._]+)@([a-zA-Z0-9.-]+).([a-zA-Z]{2,4})$',$mail)){ 
      		return FALSE; 
  		}else { 
       		return TRUE; 
  		} 

	}	
}
?>