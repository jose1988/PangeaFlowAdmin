<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$resultadoListaGrupo = $client->listarGrupos();
	
	include("../views/grupo.php");
?>