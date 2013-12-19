<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php'); 
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeRol?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$estadoGrupo = array('borrado' => '1');
	
	$rowRol = $client->listarRol($estadoGrupo);
	
	include("../views/restaurarRol.php");
	} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');
}
?>