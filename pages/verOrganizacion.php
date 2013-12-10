<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$id = $_GET["id"];
	
	if($id==""){
		$id=0;		
	}	
	$idO = array('idOrganizacion' => $id);	
	
	$resultadoBuscarOrganizacion = $client->buscarOrganizacion($idO);
	if(!isset($resultadoBuscarOrganizacion->return)){
		$organizacion = "Organización No encontrado";
	}else{
		$organizacion = $resultadoBuscarOrganizacion->return->nombre;
	}
	
	//print_r($organizacion);
	
	include("../views/verOrganizacion.php");
?>