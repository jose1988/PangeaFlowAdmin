<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
 try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php');
  
   if(!isset($_GET['id'])){
	   iraURL('../pages/skin.php');
   }
   
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionarSkin?WSDL';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	$id = $_GET['id'];
	$idSkin = array('idSkin' => $id);
	$bSkin = $client->buscarSkin($idSkin);
		
		if(!isset($bSkin->return)){
			$regSkin=0;
		}else{
			$bskins=$bSkin;
			$regSkin=count($bSkin->return);
		}	 
	
	if(!isset($bSkin->return)){
		javaalert('No existe el registro de skin');
	    iraURL('../pages/skin.php');	
	}		
	
	include("../views/verSkin.php");
	
	} catch (Exception $e) {
		
		javaalert('Lo sentimos no hay conexión');
		iraURL('../pages/index.php');	
	}
?>
