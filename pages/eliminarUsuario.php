<?php
   try{
	require_once("../lib/nusoap.php");
	include("../lib/funciones.php");
	 if(!isset($_GET["id"])){
		iraURL('../pages/usuario.php');
	}
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeUsuarios?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;	
	$idUsuario = array('idUsuario' => $_GET["id"]);	
	$rowUsuario = $client->consultarUsuario($idUsuario);
	if(!isset($rowUsuario->return)){
				javaalert('No existe el usuario');
	            iraURL('../pages/usuario.php');	
		}
	$Dependencias = $client->consultarDependenciasUsuario($idUsuario);	
			if($Dependencias->return==-1){
			    javaalert('No existe el usuario');
	            iraURL('../pages/usuario.php');	
			}
	} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');	
	}
	include("../views/eliminarUsuario.php");
	if(isset($_POST["si"])){
	 try{	  
		  $client->eliminarUsuario($idUsuario);
		  } catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../views/index.php');
			}	
			javaalert("El registro ha sido eliminado");
			iraURL('../pages/usuario.php');
	}
	if(isset($_POST["no"])){
			iraURL('../pages/usuario.php');
	}
?>