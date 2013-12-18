<?php
	require_once("../lib/nusoap.php");
	
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDepolitica?wsdl';
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;

	$politica = $client->listarPolitica();
	
	if(!isset($politica->return)){
		$regPo=0;
	}else{
		$politicas=$politica;
		$regPo=count($politica->return);
	}
	
	include("../views/politica.php");
?>
