<?php
	require_once("../lib/nusoap.php");
	require_once("../lib/funciones.php");
  	 $wsdl_url = 'http://localhost:15362/CapaDeServicios/GestionDepolitica?WSDL';
				$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	$id = $_GET['id'];
	$ID = array('ID' => $id);
	$bPolitica = $client->buscarPolitica($ID);
	
	if(isset($_POST["si"])){
	 
  			   $registroPolitica=$bPolitica;
				$client->eliminarPolitica($registroPolitica);				
		}
		if(isset($_POST["No"])){
			iraURL("../pages/AdminPolitica.php");
		}
	   	
	
	
	include("../views/eliminarPolitica.php");
	
	
?>