<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDepolitica?WSDL';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	$id = $_GET['id'];
	$idPolitica = array('idPolitica' => $id);
	$bPolitica = $client->buscarPolitica($idPolitica);
	
		if(!isset($bPolitica->return)){
			$regPo=0;
		}else{
			$bpoliticas=$bPolitica;
			$regPo=count($bPolitica->return);
		}	 
	
	include("../views/verPolitica.php");
?>
