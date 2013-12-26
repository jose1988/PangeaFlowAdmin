<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
 try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php');
   if(!isset($_GET['id'])){
    iraURL('../pages/rol.php');
   }
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeRol?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $idRol= array('idRol' => $_GET['id']);
  $rowRol = $client->consultarRol($idRol);
   if(!isset($rowRol->return)){
				javaalert('No existe el registro de rol');
	            iraURL('../pages/rol.php');	
		}		  
  include("../views/verRol.php"); 
  } catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');	
	}
?>