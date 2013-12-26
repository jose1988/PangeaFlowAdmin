<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
	include("../lib/funciones.php");
  	require_once('../lib/nusoap.php'); 
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$estadoOrganizacion = array('borrado' => '0');
	
	$resultadoListaOrganizacion = $client->listarOrganizacionByBorrado($estadoOrganizacion);
	
	include("../views/organizacion.php");
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');
}
?>