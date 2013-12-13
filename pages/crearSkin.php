<?php
	require_once("../lib/nusoap.php");
  	$wsdl_url = 'http://localhost:15362/CapaDeServicios/GestionarSkin?WSDL';	
	$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" ){		
			 if(!isset($_POST["borrado"])){
			 $borrado="1";
			 }else{
			 $borrado="0";
			 }
			 
			  $skin= 
			  array('nombre' => $_POST["nombre"],
			  				
				'borrado' => $borrado);
				$registroSkin= array('registroSkin' => $skin);	
			   
  			   
				$client->insertarSkin($registroSkin);				
		}else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}
	  } 	

	
	include("../views/crearSkin.php");
?>
