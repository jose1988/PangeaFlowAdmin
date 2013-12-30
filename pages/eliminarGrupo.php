<?php
	try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
	
		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;	
		$id = $_GET["id"];
	
		if($id==""){
			$id=0;		
		}	
		$idG = array('idGrupo' => $id);	
		$resultadoBuscarGrupo = $client->buscarGrupo($idG);
		
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../views/index.php');		
	}
	include("../views/eliminarGrupo.php");	
	
	if(isset($_POST["si"])){
		try{	  
			$resultadoEliminarGrupo = $client->eliminarGrupo($idG);
		  	} catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../views/index.php');
			}	
			javaalert("El registro ha sido eliminado");
			iraURL('../pages/grupo.php');
	}
	if(isset($_POST["no"])){
			iraURL('../pages/grupo.php');
	}
?>