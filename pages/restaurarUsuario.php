<?php
    try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
  		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeUsuarios?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;
	    $estadoBorrado = array('borradoo' => '1');	
		$rowUsuario = $client->listarUsuarios($estadoBorrado);
	if(isset($_POST["habilitar"]) && isset($_POST["ide"])){
		try{
			$registrosAEliminar=$_POST["ide"];
			$contadorEliminados=0;
			for($j=0; $j<count($rowUsuario->return); $j++){
			    if(isset($registrosAEliminar[$j])){
				$idUsuario = array('idUsuario' => $registrosAEliminar[$j]);
				$client->restaurarUsuario($idUsuario);
				$contadorEliminados++;
				}		
				if($contadorEliminados==count($_POST["ide"])){
					break;
				}
			}	
		 } catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('../views/index.php');
		}
		javaalert("Los registros han sido habilitados");
		iraURL('../pages/usuario.php');
	}elseif(isset($_POST["habilitar"])){
		javaalert("Debe seleccionar al menos un registro");
	}
		include("../views/restaurarUsuario.php");

	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../views/index.php');		
	}
?>