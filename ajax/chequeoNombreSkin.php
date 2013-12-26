<?php
sleep(1);
if(isset($_REQUEST['nombre']) && $_REQUEST['nombre']!=""){
	
	require_once('../lib/nusoap.php'); 
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarSkin?WSDL';
	$client = new SOAPClient($wsdl_url);
	$client->decode_utf8 = false; 
	$nombre= array('nombreSkin' => $_REQUEST['nombre']);
	$rowSkin = $client->consultarSkinXNombre($nombre);
	
	if(isset($rowSkin->return)){
		echo '<div align="center" id="Error">No disponible</div>';
	}else{
		echo '<div align="center" id="Success">Disponible</div>';
	}
	
}else{
	echo '<div></div>';
}
?>