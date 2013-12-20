<?php
	try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
  		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDepolitica?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;
	
		$estadoPolitica = array('borrado' => '1');
	
		$resultadoListaPolitica = $client->listarPoliticaByBorrado($estadoPolitica);
	
		include("../views/restaurarPolitica.php");
	
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../pages/index.php');		
	}
	
	if(isset($_POST["habilitar"]) && isset($_POST["ide"])){
		try{
			$rowPolitica=$_POST["ide"];
			for($j=0; $j<count($_POST["ide"]); $j++){
				
				$idP = array('idPolitica' => $rowPolitica[$j]);
				$resultadoRestaurarPolitica = $client->restaurarPolitica($idP);
			}
		} catch (Exception $e) {			 
			javaalert('Lo sentimos no hay conexión');
			iraURL('../pages/index.php');
		}	
		javaalert("El registro ha sido habilitado");
		iraURL('../pages/politica.php');
	}
?>