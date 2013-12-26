<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php'); 
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeClasificacion_rol?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $estadoBorrado= array('borrado' => '0');
  $rowClasifRol = $client->listarClasificacionRol($estadoBorrado);
  $cantClasifRol=0;
				  if(isset($rowClasifRol->return)){
						 $cantClasifRol=count($rowClasifRol->return);
				  }
				  // echo '<pre>';
  //print_r($rowClasifRol);
				  
	include("../views/clasificacionRol.php"); 
	} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../views/index.php');	
	}
?>