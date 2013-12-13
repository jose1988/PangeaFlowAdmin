<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServicios/GestionarSkin?WSDL';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	//
	$skins = $client->listar();
	
				  if(!isset($skins->return)){
						  $regSk=0;
				  }else{
						 $skin=$skins;
						 $regSk=count($skins->return);
				  }
   
	// echo '<pre>';
// print_r($politicas);
	//<input name="ver" type="button" />echo '<pre>';
	
	include("../views/adminSkin.php");
?>
