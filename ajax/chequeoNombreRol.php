<?php
sleep(1);
if(isset($_REQUEST['nombre'])&&$_REQUEST['nombre']!="") {
        require_once('../lib/nusoap.php'); 
	    $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeRol?WSDL';
				$client = new SOAPClient($wsdl_url);
				$client->decode_utf8 = false; 
				$Nombre= array('nombreRol' => $_REQUEST['nombre']);
				$rowRol = $client->consultarRolXNombre($Nombre);
				if(isset($rowRol->return)){
				echo '<div id="Error" >No disponible</div>';
				}else{
				echo '<div id="Success" >Disponible</div>';
				} 
}else{
	  echo '<div></div>';
	}

?>