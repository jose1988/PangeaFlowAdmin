<?php
   try{
	require_once("../lib/nusoap.php");
	include("../lib/funciones.php");
	 if(!isset($_GET["id"])){
		iraURL('../pages/rol.php');
	}
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeRol?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;	
	$idRol = array('idRol' => $_GET["id"]);	
	$rowRol = $client->consultarRol($idRol);
	} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');	
	}
	include("../views/eliminarRol.php");
	if(isset($_POST["si"])){
	 try{	  
		  $client->eliminarRol($idRol);
		  } catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../views/index.php');
			}	
			javaalert("El registro ha sido eliminado");
			iraURL('../pages/rol.php');
	}
	if(isset($_POST["no"])){
			iraURL('../pages/rol.php');
	}
?>