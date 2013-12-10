<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_usuario?WSDL';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	//Total de Solicitudes por Procesar
	$claUsuario = $client->listar();
	
				  if(!isset($claUsuario->return)){
						  $regCu=0;
				  }else{
						 $cUsuario=$claUsuario;
						 $regCu=count($claUsuario->return);
				  }
   
	//echo '<pre>';
 //print_r($cUsuario);
 //echo '<pre>';
	
	include("../views/adminClasificacionUsuario.php");
?>
