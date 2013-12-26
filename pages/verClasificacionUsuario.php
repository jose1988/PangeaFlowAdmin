<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
 try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php'); 
  if(!isset($_GET['id'])){
    iraURL('../pages/clasificacionUsuario.php');
   }
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_usuario?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $idClasiRol= array('idClaUsu' => $_GET['id']);
  $rowClasificacionUsuario = $client->consultarClasificacionUsuario($idClasiRol);
		if(!isset($rowClasificacionUsuario->return)){
				javaalert('No existe el registro de clasificación de usuario');
	            iraURL('../pages/clasificacionUsuario.php');	
		}
				  
	include("../views/verClasificacionUsuario.php"); 
	} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');	
	}
?>