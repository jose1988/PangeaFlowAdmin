<?php
	require_once("../lib/nusoap.php");
	require_once("../lib/funciones.php");
	
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$id = $_GET["id"];
	
	if($id==""){
		$id=0;		
	}	
	$idR = array('idReporte' => $id);
	
	$resultadoEliminarReporte = $client->eliminarReporte($idR);
	
	javaalert("Reporte eliminado");
	iraURL('../pages/reporte.php');
?>