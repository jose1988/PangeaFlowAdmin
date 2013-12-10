<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$resultadoListaOrganizacion = $client->listarOrganizacion();
	
	include("../views/organizacion.php");
?>