<?php
 
  require_once('../lib/nusoap.php'); 
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_rol?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $estadoBorrado= array('borrado' => '0');
  $rowClasifRol = $client->listarClasificacionRol($estadoBorrado);
  //$client->eliminarUsuario($param);

  
				  if(!isset($rowClasifRol->return)){
						  $cantClasifRol=0;
				  }else{
						 $cantClasifRol=count($rowClasifRol->return);
				  }
				  // echo '<pre>';
  //print_r($rowClasifRol);
				  
	include("../views/clasificacionRol.php"); 
?>