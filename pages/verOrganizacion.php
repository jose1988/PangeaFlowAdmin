<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
 try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php');
  
   if(!isset($_GET['id'])){
	   iraURL('../pages/organizacion.php');
   }
   
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeOrganizacion?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$id = $_GET["id"];
	
	if($id==""){
		$id=0;		
	}	
	$idO = array('idOrganizacion' => $id);	
	
	$resultadoBuscarOrganizacion = $client->buscarOrganizacion($idO);
	
	if(!isset($resultadoBuscarOrganizacion->return)){
		javaalert('No existe el registro de organización');
	    iraURL('../pages/organizacion.php');	
	}		
	
	include("../views/verOrganizacion.php");
	
	} catch (Exception $e) {
		
		javaalert('Lo sentimos no hay conexión');
		iraURL('../pages/index.php');	
	}
?>