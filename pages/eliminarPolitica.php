<?php
	require_once("../lib/nusoap.php");
	require_once("../lib/funciones.php");
  	 $wsdl_url = 'http://localhost:15362/CapaDeServicios/GestionDepolitica?WSDL';
				$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	
	if(isset($_POST["si"])){
	 
  			   
				$client->eliminarPolitica($registroPolitica);				
		}
		if(isset($_POST["No"])){
			iraURL("../pages/AdminPolitica.php");
		}
	   	
	
	
	include("../views/eliminarPolitica.php");
	
	
?>