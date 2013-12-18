<?php
 try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php'); 
  if(!isset($_GET['id'])){
    iraURL('../pages/clasificacionRol.php');
   }
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_rol?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $idClasiRol= array('idClasifRol' => $_GET['id']);
  $rowClasificacionRol = $client->consultarClasifRolXNombre($idClasiRol);
		if(!isset($rowClasificacionRol->return)){
				javaalert('No existe el registro de clasificación de rol');
	            iraURL('../pages/clasificacionRol.php');	
		}
				  
	include("../views/verClaisificacionRol.php"); 
	} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');	
	}
?>