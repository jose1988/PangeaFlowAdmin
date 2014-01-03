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
		
		if(!isset($resultadoBuscarReporte->return)){
			javaalert('No existe el registro de reporte');
	    	iraURL('../pages/reporte.php');	
		}elseif($resultadoBuscarReporte->return->borrado==1){
			javaalert('No existe el registro de reporte');
	        iraURL('../pages/reporte.php');	
		}
		
		$Dependencias = $client->consultarDependenciasReporte($idR);	
		if($Dependencias->return==-1){
			javaalert('No existe el registro de reporte');
	        iraURL('../pages/reporte.php');	
		}
	
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../views/index.php');	
	}
	
	include("../views/eliminarReporte.php");
	
	if(isset($_POST["si"])){
	 try{	  
		  $resultadoEliminarReporte = $client->eliminarReporte($idR);
		  } catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../views/index.php');
			}	
			javaalert("El registro ha sido eliminado");
			iraURL('../pages/reporte.php');
	}
	if(isset($_POST["no"])){
			iraURL('../pages/reporte.php');
	}
?>