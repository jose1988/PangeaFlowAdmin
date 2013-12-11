<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	/*$resultadoCrearGrupo = $client->insertarGrupo();
	if(!isset($resultadoCrearGrupo->return)){
		$grupo = "Grupo No Creado";
	}else{
		$grupo = "Grupo Creado";
	}
	*/
	//print_r($grupo);
	
	include("../views/crearGrupo.php");
?>