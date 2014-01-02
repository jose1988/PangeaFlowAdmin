<?php
    try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
  		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;
		$estadoBorrado = array('borrado' => '1');	
		$rowOrganizacion = $client->listarOrganizacionByBorrado($estadoBorrado);
		
	if(isset($_POST["habilitar"]) && isset($_POST["ide"])){
		try{
			$eliminadosOrganizacion=$_POST["ide"];
			$contadorEliminados=0;
			
			for($j=0; $j<count($rowOrganizacion->return); $j++){
				if(isset($eliminadosOrganizacion[$j])){
			   		$idOrganizacion = array('idOrganizacion' => $eliminadosOrganizacion[$j]);
					$client->restaurarOrganizacion($idOrganizacion);
					$contadorEliminados++;
				}
				if($contadorEliminados==count($eliminadosOrganizacion)){
					break;
				}
			}
			
		 } catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('../views/index.php');
		}
		javaalert("Los registros han sido habilitados");
		iraURL('../pages/organizacion.php');
		
	}elseif(isset($_POST["habilitar"])){
		javaalert("Debe seleccionar al menos un registro");
	}
		include("../views/restaurarOrganizacion.php");

	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../views/index.php');		
	}
?>