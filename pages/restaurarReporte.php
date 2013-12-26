<?php
	try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
  		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;
	
		$estadoReporte = array('borrado' => '1');
	
		$resultadoListaReporte = $client->listarReporteByBorrado($estadoReporte);
	
	if(isset($_POST["habilitar"]) && isset($_POST["ide"])){
		try{
			$eliminadosReporte=$_POST["ide"];
			$contadorEliminados=0;
			for($j=0; $j<count(count($_POST["ide"])); $j++){
				if(isset($eliminadosReporte[$j])){
					echo $eliminadosReporte[$j];
			    	$idReporte = array('idReporte' => $eliminadosReporte[$j]);
					$client->restaurarReporte($idReporte);
					$contadorEliminados++;
					echo 'entro';
				}
				if($contadorEliminados==count($eliminadosReporte)){
					break;
				}
			}
		 } catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('../pages/index.php');
	}
		javaalert("Los registros han sido habilitado");
		//iraURL('../pages/reporte.php');
	}
	
	include("../views/restaurarReporte.php");
	
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../pages/index.php');		
	}
?>