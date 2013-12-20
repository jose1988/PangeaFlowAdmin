<?php
	try{
		require_once("../lib/nusoap.php");
		require_once("../lib/funciones.php");
	
		$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDepolitica?wsdl';	
		$client = new SOAPClient($wsdl_url);	
    	$client->decode_utf8 = false;	
		$id = $_GET["id"];
	
		if($id==""){
			$id=0;		
		}	
		$idP = array('idPolitica' => $id);	
		$resultadoBuscarPolitica = $client->buscarPolitica($idP);
	
	} catch (Exception $e) {
		javaalert('Lo sentimos no hay conexión');
		iraURL('../pages/index.php');	
	}
	
	include("../views/eliminarPolitica.php");
	
	if(isset($_POST["si"])){
	 try{	  
		  $resultadoEliminarPolitica = $client->eliminarPolitica($idP);
		  } catch (Exception $e) {
				javaalert('Lo sentimos no hay conexión');
				iraURL('../pages/index.php');
			}	
			javaalert("El registro ha sido eliminado");
			iraURL('../pages/politica.php');
	}
	if(isset($_POST["no"])){
			iraURL('../pages/politica.php');
	}
?>