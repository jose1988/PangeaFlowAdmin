<?php
	try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
	
		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;	
		$id = $_GET["id"];
	
		if($id==""){
			$id=0;		
		}	
		$idR = array('idReporte' => $id);	
		$resultadoBuscarReporte = $client->buscarReporte($idR);
	
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../pages/index.php');	
	}
	
	include("../views/eliminarReporte.php");
	
	if(isset($_POST["si"])){
	 try{	  
		  $resultadoEliminarReporte = $client->eliminarReporte($idR);
		  } catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../pages/index.php');
			}	
			javaalert("El registro ha sido eliminado");
			iraURL('../pages/reporte.php');
	}
	if(isset($_POST["no"])){
			iraURL('../pages/reporte.php');
	}
?>