<?php
    try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
  		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_rol?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;
	    $estadoBorrado = array('borrado' => '1');	
		$rowClasifRol = $client->listarClasificacionRol($estadoBorrado);
	if(isset($_POST["habilitar"]) && isset($_POST["ide"])){
		try{
			$registrosAEliminar=$_POST["ide"];
			$contadorEliminados=0;
			for($j=0; $j<count($rowClasifRol->return); $j++){
			    if(isset($registrosAEliminar[$j])){
				$idClasifRol = array('idClasifRol' => $registrosAEliminar[$j]);
				$client->restaurarClasificacionRol($idClasifRol);
				$contadorEliminados++;
				}
				if($contadorEliminados==count($_POST["ide"])){
					break;
				}
			}
		 } catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('../pages/index.php');
		}
		javaalert("Los registros han sido habilitados");
		iraURL('../pages/clasificacionRol.php');
	}elseif(isset($_POST["habilitar"])){
		javaalert("Debe seleccionar al menos un registro");
	}
		include("../views/restaurarclasificacionRol.php");

	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../pages/index.php');		
	}
?>