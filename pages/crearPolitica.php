<?php
	require_once("../lib/nusoap.php");
  	 $wsdl_url = 'http://localhost:15362/CapaDeServicios/GestionDepolitica?WSDL';
				$client = new SOAPClient($wsdl_url);	
    $client->decode_utf8 = false;
	
	
	if(isset($_POST["crear_uno"]) || isset($_POST["crear_otro"])){
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!="" && isset($_POST["documentacion"]) && $_POST["documentacion"]!="" && isset($_POST["descripcion"]) && $_POST["descripcion"]!="" && isset($_POST["estado"]) && $_POST["estado"]!="" && isset($_POST["clasificacion"]) && $_POST["clasificacion"]!="" ){		
			 if(!isset($_POST["borrado"])){
			 $borrado="0";
			 }else{
			 $borrado="1";
			 }
			 
			  $politica= 
			  array('nombre' => $_POST["nombre"],
			  	'descripcion' => $_POST["descripcion"],
				'documentacion' => $_POST["documentacion"],	
				'implementacion' => $_POST["implementacion"],				
				'estado' => $_POST["estado"],
				'borrado' => $borrado);
				$registroPolitica= array('registroPolitica' => $politica);	
			   
  			   
				$client->insertarPolitica($registroPolitica);				
		}else{
			javaalert("Debe agregar todos los campos, por favor verifique");
		}
	  } 	
	
	
	include("../views/crearPolitica.php");
	
	
?>