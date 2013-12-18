<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php'); 
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeRol?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $estadoBorrado= array('borrado' => '0');
  $rowRol = $client->listarRol($estadoBorrado);
  $cantRol=0;
	if(isset($rowRol->return)){
			 $cantRol=count($rowRol->return);
	}			  
	include("../views/rol.php"); 
	
	} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');
	
}
?>