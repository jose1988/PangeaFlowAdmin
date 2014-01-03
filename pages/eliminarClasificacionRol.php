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
	    if(!isset($rowClasifRol->return)){
				javaalert('No existe el registro de clasificación de rol');
	            iraURL('../pages/clasificacionRol.php');	
		}elseif($rowClasifRol->return->borrado==1){
				javaalert('No existe el registro de clasificación de rol');
	            iraURL('../pages/clasificacionRol.php');	
		}
	$Dependencias = $client->consultarDependenciasClasRol($idClasifRol);	
			if($Dependencias->return==-1){
			    javaalert('No existe el registro de clasificación de rol');
	            iraURL('../pages/clasificacionRol.php');	
			}
			
	} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');	
	}
	include("../views/eliminarClasificacionRol.php");
	if(isset($_POST["si"])){
	 try{	  
		  $client->eliminarClasificacionRol($idClasifRol);
		  } catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../views/index.php');
			}	
			javaalert("El registro ha sido eliminado");
			iraURL('../pages/clasificacionRol.php');
	}
	if(isset($_POST["no"])){
			iraURL('../pages/clasificacionRol.php');
	}
?>