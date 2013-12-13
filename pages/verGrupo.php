<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$id = $_GET["id"];
	
	if($id==""){
		$id=0;		
	}	
	$idG = array('idGrupo' => $id);	
	
	$resultadoBuscarGrupo = $client->buscarGrupo($idG);
	
	/*if(!isset($resultadoBuscarGrupo->return)){
		$grupo = "Grupo No encontrado";
	}else{
		$grupo = $resultadoBuscarGrupo->return->nombre;
	}*/
	
	//print_r($grupo);
	
	include("../views/verGrupo.php");
?>