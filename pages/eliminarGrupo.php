<?php
	require_once("../lib/nusoap.php");
	require_once("../lib/funciones.php");
	
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;	
	$id = $_GET["id"];
	
	if($id==""){
		$id=0;		
	}	
	$idG = array('idGrupo' => $id);	
	$resultadoBuscarGrupo = $client->buscarGrupo($idG);
	
	include("../views/eliminarGrupo.php");
?>