<?php
	require_once("../lib/nusoap.php");
	require_once("../lib/funciones.php");
	
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$id = $_GET["id"];
	
	if($id==""){
		$id=0;		
	}	
	$idO = array('idOrganizacion' => $id);
	
	$resultadoEliminarOrganizacion = $client->eliminarOrganizacion($idO);
	
	javaalert("Organización eliminado");
	iraURL('../pages/organizacion.php');
?>