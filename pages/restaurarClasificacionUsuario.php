<?php
    try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
  		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_usuario?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;
	    $estadoBorrado = array('borrado' => '1');	
		$rowClasifUsuario = $client->listarClasificacionUsuario($estadoBorrado);
	if(isset($_POST["habilitar"]) && isset($_POST["ide"])){
		try{
			$registrosAEliminar=$_POST["ide"];
			$contadorEliminados=0;
			for($j=0; $j<count($rowClasifUsuario->return); $j++){
			    if(isset($registrosAEliminar[$j])){
				$idClasifUsuario = array('idClaUsu' => $registrosAEliminar[$j]);
				$client->restaurarClasificacionUsuario($idClasifUsuario);
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
		iraURL('../pages/clasificacionUsuario.php');
	}elseif(isset($_POST["habilitar"])){
		javaalert("Debe seleccionar al menos un registro");
	}
		include("../views/restaurarclasificacionUsuario.php");

	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../views/index.php');		
	}
?>