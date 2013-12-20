<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarSkin?WSDL';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	$id = $_GET['id'];
	$idSkin = array('idSkin' => $id);
	$bSkin = $client->buscarSkin($idSkin);
		
		if(!isset($bSkin->return)){
			$regSkin=0;
		}else{
			$bskins=$bSkin;
			$regSkin=count($bSkin->return);
		}	 
	
	include("../views/verSkin.php");
?>
