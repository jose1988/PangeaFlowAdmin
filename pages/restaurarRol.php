<?php
    try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
  		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeRol?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;
		$estadoBorrado = array('borrado' => '1');	
		$rowRol = $client->listarRol($estadoBorrado);
	if(isset($_POST["habilitar"]) && isset($_POST["ide"])){
		try{
			$eliminadosRol=$_POST["ide"];
			$contadorEliminados=0;
			for($j=0; $j<count($rowRol->return); $j++){
				if(isset($eliminadosRol[$j])){
					$idRol = array('idRol' => $eliminadosRol[$j]);
					$client->restaurarRol($idRol);
					$contadorEliminados++;
				}
				if($contadorEliminados==count($eliminadosRol)){
					break;
				}
			}
		 } catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('../views/index.php');
		}
		javaalert("Los registros han sido habilitados");
		iraURL('../pages/rol.php');
	}elseif(isset($_POST["habilitar"])){
		javaalert("Debe seleccionar al menos un registro");
	}
		include("../views/restaurarRol.php");

	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../views/index.php');		
	}
?>