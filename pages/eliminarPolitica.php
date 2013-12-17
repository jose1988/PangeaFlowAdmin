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
			
				$client->eliminarPolitica($ID);	
				iraURL("../pages/AdminPolitica.php");
							
		}
		
		if(isset($_POST["No"])){
			javaalert("Politica eliminada");
			iraURL("../pages/AdminPolitica.php");
				
		}
		
	include("../views/eliminarPolitica.php");
?>