<?php
   try{
	require_once("../lib/nusoap.php");
	include("../lib/funciones.php");
	 if(!isset($_GET["id"])){
		iraURL('../pages/clasificacionRol.php');
	}
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_rol?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;	
	$idClasifRol = array('idClasifRol' => $_GET["id"]);	
	$rowClasifRol = $client->consultarClasifRol($idClasifRol);
	} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');	
	}
	include("../views/eliminarClasificacionRol.php");
	if(isset($_POST["si"])){
	 try{	  
		  $client->eliminarClasificacionRol($idClasifRol);
		  } catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../pages/index.php');
			}	
			javaalert("El registro ha sido eliminado");
			iraURL('../pages/clasificacionRol.php');
	}
	if(isset($_POST["no"])){
			iraURL('../pages/clasificacionRol.php');
	}
?>