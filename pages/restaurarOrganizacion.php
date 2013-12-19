<?php
	try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
  		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;
	
		$estadoOrganizacion = array('borrado' => '1');
	
		$resultadoListaOrganizacion = $client->listarOrganizacionByBorrado($estadoOrganizacion);
	
		include("../views/restaurarOrganizacion.php");
	
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../pages/index.php');		
	}
	
	if(isset($_POST["habilitar"]) && isset($_POST["ide"])){
		try{
			$rowOrganizacion=$_POST["ide"];
			for($j=0; $j<count($_POST["ide"]); $j++){
				
				$idO = array('idOrganizacion' => $rowOrganizacion[$j]);
				$resultadoRestaurarOrganizacion = $client->restaurarOrganizacion($idO);
			}
		} catch (Exception $e) {			 
			javaalert('Lo sentimos no hay conexión');
			iraURL('../pages/index.php');
		}	
		javaalert("El registro ha sido habilitado");
		iraURL('../pages/organizacion.php');
	}
?>