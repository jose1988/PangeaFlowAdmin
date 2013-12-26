<?php
    try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
  		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;
		$estadoBorrado = array('borrado' => '1');	
		$rowReporte = $client->listarReporteByBorrado($estadoBorrado);
		
	if(isset($_POST["habilitar"]) && isset($_POST["ide"])){
		try{
			$eliminadosReporte=$_POST["ide"];
			$contadorEliminados=0;
			
			if(count($eliminadosReporte)==1){
			   	$idReporte = array('idReporte' => $eliminadosReporte);
				$client->restaurarReporte($idReporte);
			}else{
				for($j=0; $j<count($rowReporte->return); $j++){
					if(isset($eliminadosReporte[$j])){
			    		$idReporte = array('idReporte' => $eliminadosReporte[$j]);
						$client->restaurarReporte($idReporte);
						$contadorEliminados++;
					}
					if($contadorEliminados==count($eliminadosReporte)){
						break;
					}
				}
			}
		 } catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('../pages/index.php');
		}
		javaalert("Los registros han sido habilitados");
		iraURL('../pages/reporte.php');
		
	}elseif(isset($_POST["habilitar"])){
		javaalert("Debe seleccionar al menos un registro");
	}
		include("../views/restaurarReporte.php");

	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../pages/index.php');		
	}
?>