<?php
sleep(1);
if(isset($_REQUEST['nombre'])&&$_REQUEST['nombre']!="") {
        require_once('../lib/nusoap.php'); 
	    $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_usuario?WSDL';
				$client = new SOAPClient($wsdl_url);
				$client->decode_utf8 = false; 
				$Nombre= array('Nombre' => $_REQUEST['nombre']);
				$rowClasifUsuario = $client->consultarClasifUsuarioXNombre($Nombre);
				if(isset($rowClasifUsuario->return)){
				echo '<div id="Error" >No disponible</div>';
				}else{
				echo '<div id="Success" >Disponible</div>';
				} 
}else{
	  echo '<div></div>';
	}

?>