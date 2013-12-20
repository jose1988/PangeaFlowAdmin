<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarSkin?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$estadoSkin = array('borrado' => '0');
	
	$resultadoListaSkin = $client->listarXBorrado($estadoSkin);
	
	include("../views/skin.php");
?>
