<?php
 
  require_once('../lib/nusoap.php'); 
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeUsuarios?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $estadoBorrado= array('borradoo' => 'false');
  $params = array(
                'borradoo' => "1",
            );
			  $param = array(
                'ID' => "thunder",
            );
  $rowUsuario = $client->listarUsuarios($params);
  //  echo '<pre>';
//  print_r($rowUsuario);
				  if(!isset($rowUsuario->return)){
						  $cantUsuarios=0;
				  }else{
						 $cantUsuarios=count($rowUsuario->return);
				  }
	include("../views/usuariox.php"); 
?>