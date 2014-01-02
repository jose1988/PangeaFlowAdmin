<?php
    try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
  		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;
		$estadoBorrado = array('borrado' => '1');	
		$rowGrupo = $client->listarGruposByBorrado($estadoBorrado);
		
	if(isset($_POST["habilitar"]) && isset($_POST["ide"])){
		try{
			$eliminadosGrupo=$_POST["ide"];
			$contadorEliminados=0;
			
			if(count($eliminadosGrupo)==1){
				
			  	if(isset($eliminadosGrupo[0])){
					$idGrupo = array('idGrupo' => $eliminadosGrupo[0]);
			 	} else{
					$idGrupo = array('idGrupo' => $eliminadosGrupo);
			 	}
			   	$idGrupo = array('idGrupo' => $eliminadosGrupo);
				$client->restaurarGrupo($idGrupo);
				
			}else{
				for($j=0; $j<count($rowGrupo->return); $j++){
					if(isset($eliminadosGrupo[$j])){
			    		$idGrupo = array('idGrupo' => $eliminadosGrupo[$j]);
						$client->restaurarGrupo($idGrupo);
						$contadorEliminados++;
					}
					if($contadorEliminados==count($eliminadosGrupo)){
						break;
					}
				}
			}
		 } catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('../views/index.php');
		}
		javaalert("Los registros han sido habilitados");
		iraURL('../pages/grupo.php');
		
	}elseif(isset($_POST["habilitar"])){
		javaalert("Debe seleccionar al menos un registro");
	}
		include("../views/restaurarGrupo.php");

	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../views/index.php');		
	}
?>