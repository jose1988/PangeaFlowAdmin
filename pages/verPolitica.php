<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
 try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php');
  
   if(!isset($_GET['id'])){
	   iraURL('../pages/politica.php');
   }
   
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDepolitica?WSDL';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	$id = $_GET['id'];
	$idPolitica = array('idPolitica' => $id);
	$bPolitica = $client->buscarPolitica($idPolitica);
	
		if(!isset($bPolitica->return)){
			$regPo=0;
		}else{
			$bpoliticas=$bPolitica;
			$regPo=count($bPolitica->return);
		}	 
	
	if(!isset($bPolitica->return)){
		javaalert('No existe el registro de política');
	    iraURL('../pages/politica.php');	
	}		
	
	include("../views/verPolitica.php");
	
	} catch (Exception $e) {
		
		javaalert('Lo sentimos no hay conexión');
		iraURL('../views/index.php');	
	}
?>
