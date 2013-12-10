<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDepolitica?WSDL';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	//
	$politica = $client->listar();
	
				  if(!isset($politica->return)){
						  $regPo=0;
				  }else{
						 $politicas=$politica;
						 $regPo=count($politica->return);
				  }
   
	// echo '<pre>';
// print_r($politicas);
	//<input name="ver" type="button" />echo '<pre>';
	
	include("../views/adminPolitica.php");
?>
