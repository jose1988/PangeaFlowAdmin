<?php
 
  require_once('../lib/nusoap.php'); 
  $wsdl_url = 'http://localhost:15362/CapaDeServiciosAdmin/GestionDeRol?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $idRol= array('idRol' => $_GET['id']);
  $rowRol = $client->consultarRol($idRol);
				  if(!isset($rowRol->return)){
						  $cantRol=0;
				  }else{
						 $cantRol=count($rowRol->return);
				  }
	//			   echo '<pre>';
  //print_r($rowRol);			  
  include("../views/verRol.php"); 
?>