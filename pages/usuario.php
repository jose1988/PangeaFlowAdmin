<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
  try {
  include("../lib/funciones.php");
  require_once('../lib/nusoap.php'); 
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeUsuarios?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $estadoBorrado= array('borradoo' => 'false');
  $params = array('borradoo' => "0");
  $rowUsuario = $client->listarUsuarios($params);
   $cantUsuarios=0;
  //  echo '<pre>';
//  print_r($rowUsuario);
				  if(isset($rowUsuario->return)){
						 $cantUsuarios=count($rowUsuario->return);
				  }
	include("../views/usuario.php"); 
	} catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('../pages/index.php');
		}
?>