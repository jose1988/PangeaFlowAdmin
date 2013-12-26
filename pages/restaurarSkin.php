<?php
	try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
  		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarSkin?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;
	
		$estadoSkin = array('borrado' => '1');	
		$resultadoListaSkin = $client->listarXBorrado($estadoSkin);
	
		include("../views/restaurarSkin.php");
	
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../pages/index.php');		
	}
	
	if(isset($_POST["habilitar"]) && isset($_POST["ide"])){
		try{
			$rowSkin=$_POST["ide"];
			for($j=0; $j<count($_POST["ide"]); $j++){
				
				$idS = array('idSkin' => $rowSkin[$j]);
				$resultadoRestaurarSkin = $client->restaurarSkin($idS);
			}
			
		 } catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('../pages/index.php');
		}
		javaalert("El registro ha sido habilitado");
		iraURL('../pages/skin.php');
	}
?>