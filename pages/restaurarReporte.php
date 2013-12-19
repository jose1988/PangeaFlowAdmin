<?php
	try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
  		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;
	
		$estadoReporte = array('borrado' => '1');
	
		$resultadoListaReporte = $client->listarReporteByBorrado($estadoReporte);
	
		include("../views/restaurarReporte.php");
	
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../pages/index.php');		
	}
	
	if(isset($_POST["habilitar"])){
		try{
			$idR = array('idReporte' => $_POST["habilitar"]);
			$resultadoRestaurarReporte = $client->restaurarReporte($idR);
			
		 } catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('../pages/index.php');
		}	
		javaalert("El registro ha sido habilitado");
		iraURL('../pages/reporte.php');
	}
?>