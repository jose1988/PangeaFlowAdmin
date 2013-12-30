<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
	include("../lib/funciones.php");
  	require_once('../lib/nusoap.php');
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$estadoReporte = array('borrado' => '0');	
	$resultadoListaReporte = $client->listarReporteByBorrado($estadoReporte);	
	include("../views/reporte.php");
	
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');
}
?>