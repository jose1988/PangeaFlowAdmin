<?php
    try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
  		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDepolitica?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;
		$estadoBorrado = array('borrado' => '1');	
		$rowPolitica = $client->listarPoliticaByBorrado($estadoBorrado);
		
	if(isset($_POST["habilitar"]) && isset($_POST["ide"])){
		try{
			$eliminadosPolitica=$_POST["ide"];
			$contadorEliminados=0;
			
			if(count($eliminadosPolitica)==1){
			   	if(isset($eliminadosPolitica[0])){
					$idPolitica = array('idPolitica' => $eliminadosPolitica[0]);
			 	} else{
					$idPolitica = array('idPolitica' => $eliminadosPolitica);
			 	}
			   	$idPolitica = array('idPolitica' => $eliminadosPolitica);
				$client->restaurarPolitica($idPolitica);
				
			}else{
				for($j=0; $j<count($rowPolitica->return); $j++){
					if(isset($eliminadosPolitica[$j])){
			    		$idPolitica = array('idPolitica' => $eliminadosPolitica[$j]);
						$client->restaurarPolitica($idPolitica);
						$contadorEliminados++;
					}
					if($contadorEliminados==count($eliminadosPolitica)){
						break;
					}
				}
			}
		 } catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('../views/index.php');
		}
		javaalert("Los registros han sido habilitados");
		iraURL('../pages/politica.php');
		
	}elseif(isset($_POST["habilitar"])){
		javaalert("Debe seleccionar al menos un registro");
	}
		include("../views/restaurarPolitica.php");

	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../views/index.php');		
	}
?>