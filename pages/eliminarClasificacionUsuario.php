<?php
   try{
	require_once("../lib/nusoap.php");
	include("../lib/funciones.php");
	 if(!isset($_GET["id"])){
		iraURL('../pages/clasificacionUsuario.php');
	}
	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_usuario?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;	
	$idClasifUsuario = array('idClaUsu' => $_GET["id"]);	
	$rowClasifUsuario = $client->consultarClasificacionUsuario($idClasifUsuario);
	if(!isset($rowClasifUsuario->return)){
				javaalert('No existe el registro de clasificación de usuario');
	            iraURL('../pages/clasificacionUsuario.php');	
		}
	$Dependencias = $client->consultarDependenciasClasUsuario($idClasifUsuario);	
			if($Dependencias->return==-1){
			    javaalert('No existe el registro de clasificación de usuario');
	            iraURL('../pages/clasificacionUsuario.php');	
			}
	
	} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');	
	}
	include("../views/eliminarClasificacionUsuario.php");
	if(isset($_POST["si"])){
	 try{	  
		  $client->eliminarClasificacionUsuario($idClasifUsuario);
		  } catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../views/index.php');
			}	
			javaalert("El registro ha sido eliminado");
			iraURL('../pages/clasificacionUsuario.php');
	}
	if(isset($_POST["no"])){
			iraURL('../pages/clasificacionUsuario.php');
	}
?>