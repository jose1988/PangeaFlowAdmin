<?php
	try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
	
		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarSkin?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;	
		$id = $_GET["id"];
	
		if($id==""){
			$id=0;		
		}	
		$idS = array('idSkin' => $id);	
		$resultadoBuscarSkin = $client->buscarSkin($idS);
		
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../pages/index.php');		
	}
	include("../views/eliminarSkin.php");	
	
	if(isset($_POST["si"])){
		try{	  
			$resultadoEliminarSkin = $client->eliminarSkin($idS);
		  	} catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../pages/index.php');
			}	
			javaalert("El registro ha sido eliminado");
			iraURL('../pages/skin.php');
	}
	if(isset($_POST["no"])){
			iraURL('../pages/skin.php');
	}
?>