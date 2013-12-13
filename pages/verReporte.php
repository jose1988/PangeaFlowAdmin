<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$id = $_GET["id"];
	
	if($id==""){
		$id=0;		
	}	
	$idR = array('idReporte' => $id);	
	
	$resultadoBuscarReporte = $client->buscarReporte($idR);
	
	/*if(!isset($resultadoBuscarReporte->return)){
		$reporte = "Reporte No encontrado";
	}else{
		$reporte = $resultadoBuscarReporte->return->nombre;
	}*/
	
	//print_r($reporte);
	
	include("../views/verReporte.php");
?>