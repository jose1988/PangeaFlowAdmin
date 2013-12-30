<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
 try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php');
  
   if(!isset($_GET['id'])){
	   iraURL('../pages/reporte.php');
   }
   
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarReporte?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$id = $_GET["id"];
	
	if($id==""){
		$id=0;		
	}	
	$idR = array('idReporte' => $id);	
	
	$resultadoBuscarReporte = $client->buscarReporte($idR);
	
	if(!isset($resultadoBuscarReporte->return)){
		javaalert('No existe el registro de reporte');
	    iraURL('../pages/reporte.php');	
	}		
	
	include("../views/verReporte.php");
	
	} catch (Exception $e) {
		
		javaalert('Lo sentimos no hay conexión');
		iraURL('../views/index.php');	
	}
?>