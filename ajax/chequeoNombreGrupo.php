<?php
sleep(1);
if(isset($_REQUEST['nombre']) && $_REQUEST['nombre']!=""){
	
	require_once('../lib/nusoap.php'); 
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?WSDL';
	$client = new SOAPClient($wsdl_url);
	$client->decode_utf8 = false; 
	$nombre= array('nombreGrupo' => $_REQUEST['nombre']);
	$rowGrupo = $client->consultarGrupoXNombre($nombre);
	
	if(isset($rowGrupo->return)){
		echo '<div align="center" id="Error">No disponible</div>';
	}else{
		echo '<div align="center" id="Success">Disponible</div>';
	}
	
}else{
	echo '<div></div>';
}
?>