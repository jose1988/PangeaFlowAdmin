<?php
 try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php'); 
  if(!isset($_GET['id'])){
    iraURL('../pages/usuario.php');
   }
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeRol?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $idUsuario= array('idUsuario' => $_GET['id']);
  $rowRol = $client->consultarUsuario($idUsuario);
		if(!isset($rowClasificacionRol->return)){
				javaalert('No existe el registro de usuario');
	            iraURL('../pages/usuario.php');	
		}
	include("../views/verUsuario.php"); 
	} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');	
	}
?>