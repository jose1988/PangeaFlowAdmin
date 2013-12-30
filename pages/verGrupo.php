<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
 try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php');
  
   if(!isset($_GET['id'])){
	   iraURL('../pages/grupo.php');
   }
   
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeGrupo?wsdl';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	$id = $_GET["id"];
	
	if($id==""){
		$id=0;		
	}	
	$idG = array('idGrupo' => $id);	
	
	$resultadoBuscarGrupo = $client->buscarGrupo($idG);
	
	if(!isset($resultadoBuscarGrupo->return)){
		javaalert('No existe el registro de grupo');
	    iraURL('../pages/grupo.php');	
	}		
	
	include("../views/verGrupo.php");
	
	} catch (Exception $e) {
		
		javaalert('Lo sentimos no hay conexión');
		iraURL('../views/index.php');	
	}
?>