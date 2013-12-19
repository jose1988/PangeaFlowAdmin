<?php
	try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
  		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;
	
		$estadoGrupo = array('borrado' => '1');	
		$resultadoListaGrupo = $client->listarGruposByBorrado($estadoGrupo);
	
		include("../views/restaurarGrupo.php");
	
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../pages/index.php');		
	}
	
	if(isset($_POST["habilitar"]) && isset($_POST["ide"])){
		try{
			$rowGrupo=$_POST["ide"];
			for($j=0; $j<count($_POST["ide"]); $j++){
				
				$idG = array('idGrupo' => $rowGrupo[$j]);
				$resultadoRestaurarGrupo = $client->restaurarGrupo($idG);
			}
			
		 } catch (Exception $e) {
			javaalert('Lo sentimos no hay conexión');
			iraURL('../pages/index.php');
		}
		javaalert("El registro ha sido habilitado");
		iraURL('../pages/grupo.php');
	}
?>