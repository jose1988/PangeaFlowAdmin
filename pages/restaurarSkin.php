<?php
    try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
  		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarSkin?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;
		$estadoBorrado = array('borrado' => '1');	
		$rowSkin = $client->listarXBorrado($estadoBorrado);
		
	if(isset($_POST["habilitar"]) && isset($_POST["ide"])){
		try{
			$eliminadosSkin=$_POST["ide"];
			$contadorEliminados=0;
			
			for($j=0; $j<count($rowSkin->return); $j++){
				if(isset($eliminadosSkin[$j])){
			   		$idSkin = array('idSkin' => $eliminadosSkin[$j]);
					$client->restaurarSkin($idSkin);
					$contadorEliminados++;
				}
				if($contadorEliminados==count($eliminadosSkin)){
					break;
				}
			}
			
		 } catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('../views/index.php');
		}
		javaalert("Los registros han sido habilitados");
		iraURL('../pages/skin.php');
		
	}elseif(isset($_POST["habilitar"])){
		javaalert("Debe seleccionar al menos un registro");
	}
		include("../views/restaurarSkin.php");

	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../views/index.php');		
	}
?>