<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$resultadoListaReporte = $client->listarReporte();
	
	include("../views/reporte.php");
?>