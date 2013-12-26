<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
	include("../lib/funciones.php");
  	require_once('../lib/nusoap.php');	
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDepolitica?wsdl';
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;

	$politica = $client->listarPolitica();
	
	if(!isset($politica->return)){
		$regPo=0;
	}else{
		$politicas=$politica;
		$regPo=count($politica->return);
	}
	
	include("../views/politica.php");
	
} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');
}
?>
