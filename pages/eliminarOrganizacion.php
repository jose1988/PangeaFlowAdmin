<?php
	try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
	
		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;	
		$id = $_GET["id"];
	
		if($id==""){
			$id=0;		
		}	
		$idO = array('idOrganizacion' => $id);	
		$resultadoBuscarOrganizacion = $client->buscarOrganizacion($idO);
		
		if(!isset($resultadoBuscarOrganizacion->return)){
			javaalert('No existe el registro de organizacion');
	    	iraURL('../pages/organizacion.php');	
		}
		$Dependencias = $client->consultarDependenciasOrganizacion($idO);	
		if($Dependencias->return==-1){
			javaalert('No existe el registro de organizacion');
	        iraURL('../pages/organizacion.php');	
		}
	
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../views/index.php');	
	}
	
	include("../views/eliminarOrganizacion.php");
	
	if(isset($_POST["si"])){
	 try{	  
		  $resultadoEliminarOrganizacion = $client->eliminarOrganizacion($idO);
		  } catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../views/index.php');
			}	
			javaalert("El registro ha sido eliminado");
			iraURL('../pages/organizacion.php');
	}
	if(isset($_POST["no"])){
			iraURL('../pages/organizacion.php');
	}
?>