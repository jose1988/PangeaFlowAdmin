<?php
sleep(1);
if(isset($_REQUEST['nombre']) && $_REQUEST['nombre']!=""){
	
	require_once('../lib/nusoap.php'); 
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDepolitica?WSDL';
	$client = new SOAPClient($wsdl_url);
	$client->decode_utf8 = false; 
	$nombre= array('nombrePolitica' => $_REQUEST['nombre']);
	$rowPolitica = $client->consultarPoliticaXNombre($nombre);
	
	if(isset($rowPolitica->return)){
		echo '<div align="center" id="Error">No disponible</div>';
	}else{
		echo '<div align="center" id="Success">Disponible</div>';
	}
	
}else{
	echo '<div></div>';
}
?>