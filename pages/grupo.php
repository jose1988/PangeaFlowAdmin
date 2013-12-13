<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$estadoGrupo = array('borrado' => '0');
	
	$resultadoListaGrupo = $client->listarGruposByBorrado($estadoGrupo);
	
	include("../views/grupo.php");
?>